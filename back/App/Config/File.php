<?php

namespace Config;

use Config\Photos\Photos;
use Model\DAO\PersonaDAO;
use Model\Items\Persona;

class File
{
    private $tmp;
    private $filename;
    private $type;
    private $uploadPath;
    private $size;
    private $maxSize;
    private $fullPath;
    private $error;
    private $uploaded;
    private $newDirectory;
    private $ext;
    private $projectRootPath;

    private function __construct($file, $uploadPath = '', $uploaded = true, $maxSize = 10)
    {
        $this->filename = $file["name"];
        $this->tmp = $file["tmp_name"];
        $this->size = $file["size"];
        $this->type = $file['type'];
        $this->error = $file['error'];
        $this->maxSize = self::MBtoB($maxSize);
        $this->uploaded = $uploaded;
        $this->uploadPath = $uploadPath == '' ? self::fullPath('public/assets/uploads') : self::fullPath($uploadPath);
        $this->ext = self::extension($this->filename);
        $this->updatePath();
//        $this->newDirectory = File::newDirectory($this->projectRootPath);
    }

    public function delete(): void
    {
        unlink($this->fullPath);
    }

    public function projectRootPath()
    {
        return $this->projectRootPath;
    }

    public function iExist()
    {
        return File::exists($this->fullPath);
    }

    private function updatePath()
    {
        $this->updateFullPath();
        $this->updateProjectRootPath();
    }

    private function updateProjectRootPath()
    {
        $strs = explode('\\back', $this->fullPath);
        $this->projectRootPath = File::dir($strs[1]);
    }

    public function rootPath()
    {
        return $this->fullPath('');
    }

    private function updateFullPath()
    {
        $this->fullPath = $this->uploadPath . '\\' . $this->filename;
    }

    public function reverseName()
    {
        $this->rename(self::deleteExtension($this->tmp));
        return $this;
    }

    public function changeNames(File $file): self
    {
        $tmp = $this->nameNoExt();
        $tmp2 = $file->nameNoExt();
        $this->rename($this->nameNoExt() . 'temp');
        $file->rename($tmp);
        $this->rename($tmp2);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNewDirectory()
    {
        return $this->newDirectory;
    }

    /**
     * @return mixed
     */
    public function error()
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getFullPath(): string
    {
        return $this->fullPath;
    }


    public function setUploadPath($path)
    {
        $this->uploadPath = $path;
    }

    /**
     * @return mixed
     */
    public function getTmp()
    {
        return $this->tmp;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->filename;
    }

    public function nameNoExt()
    {
        return self::deleteExtension($this->filename);
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function uploadPath(): string
    {
        return $this->uploadPath;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    public function upload($dir = ''): ?self
    {
        if ($this->iExist()) return $this;

        self::newDirectory($dir);
        $path = $this->rootPath();
        $path .= $dir == '' ? $this->projectRootPath : $dir;

        if ($this->error == UPLOAD_ERR_OK) {
            $name = basename($this->filename);
            $full = $path . "\\" . $name;
            move_uploaded_file($this->tmp, $full);
            $this->filename = $name;
            $this->tmp = $name;
            $this->updatePath();
        }
        return $this;
    }

    public function rename(string $name): self
    {
        $name .= '.' . $this->ext;
        $from = $this->fullPath;
        $to = $this->uploadPath . '\\' . $name;

        $this->filename = $name;
        rename($from, $to);
        $this->updatePath();

        return $this;
    }


    public static function uploadAll($name = 'file')
    {
        $upload = self::getUploadeds($name . '[]');
        foreach ($upload as $u) {
            if ($u instanceof File) {
                $u->upload();
            }
        }
    }

    private static function reArrayFiles(array $arr): array
    {
        foreach ($arr as $key => $all) {
            foreach ($all as $i => $val) {
                $new[$i][$key] = $val;
            }
        }
        return $new;
    }

    public static function toFile($path, $name, int $maxSize = 10): ?File
    {
        $fullPath = self::fullPath($path) . '/' . $name;

        if (!self::exists($fullPath)) return null;
        $size = self::size($fullPath);
        $type = self::type($fullPath);

        $file = ['name' => $name, 'tmp_name' => $name, 'size' => $size, 'type' => $type, 'error' => 0];
        return new self($file, $path, true, $maxSize);
    }

    public static function size($path)
    {
        return self::exists($path) ? filesize($path) : null;
    }

    private static function getFileSubmited($name): ?array
    {
        if (isset($_FILES[$name])) {
            $file_ary = self::reArrayFiles($_FILES[$name]);
        } else {
            if (isset($_FILES[$name]["name"])) {
                $filename = $_FILES[$name]["name"];
                $tmp = $_FILES[$name]["tmp_name"];
                $size = $_FILES[$name]["size"];
                $fileType = $_FILES[$name]['type'];
                $error = $_FILES[$name]['error'];
                $file_ary = [['name' => $filename, 'type' => $fileType, 'tmp_name' => $tmp, 'error' => $error, 'size' => $size]];
            } else {
                $file_ary = [];
            }
        }
        return $file_ary;
    }

    public static function getUploadeds($name): array
    {
        $arr = self::getFileSubmited($name);
        $new = [];
        foreach ($arr as $f) {
            $new[] = new File($f);
        }
        return $new;
    }

    public static function exists(string $path): bool
    {
        return file_exists($path);
    }

    public static function fetchAll($dir)
    {
        return array_diff(scandir($dir), array('..', '.'));
    }

    public static function verifyType(string $path, string $file, array $fileTypes): bool
    {
        $fullPath = self::fullPath($path, $file);
        return File::exists($fullPath) ? in_array(File::extension($file), $fileTypes) : false;
    }

    public static function fullPath($dir, $filename = ''): string
    {
        return File::real(self::rootIt($dir . '/' . $filename));
    }


    public static function rootIt(string $path): string
    {
        return BACK . $path;
    }

    public static function real($path)
    {
        return realpath($path);
    }

    public static function newDirectory($path): bool
    {
        print_r($path . '<br>');
        $path = self::rootIt($path) . '/';
        print_r($path . '<br>');
        print_r(self::exists($path) . '<br>');
        if (self::exists($path)) return false;
        print_r('Creating dir'. '</br>');
        print_r(mkdir($path, 0777));
        return true;
    }

    public static function setProfileImage($id, $image)
    {
        $file = PERFIL . $id . ".png";
        file_put_contents($file, $image);
        return $file;
    }

    public static function setRandomImageByName($name, $surname, $id, $size = 128)
    {
        return self::setProfileImage($id, file_get_contents("https://api.adorable.io/avatars/" . $size . "/" . $id . ".png"));
    }

    public static function getProfileImage(Persona $persona): string
    {
        $id = $persona->getId();
        $name = $persona->getNombre();
        $surname = $persona->getApellido1();

        $img = Photos::me()->mainPath();
        if ($img != null) {
            return $img;
        }
        return self::setRandomImageByName($name, $surname, $id);
    }

    public static function get($path)
    {

    }

    public static function getProfileImageById($idPersona)
    {
        $persona = PersonaDAO::getById($idPersona);
        return self::getProfileImage($persona);
    }

    public static function extension(string $path): ?string
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    public static function deleteExtension(string $path)
    {
        return self::fileName($path);
    }

    public static function fileName(string $path)
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public static function type($path): ?string
    {
        return self::exists($path) ? filetype($path) : null;
    }

    public static function dir($path)
    {
        return pathinfo($path, PATHINFO_DIRNAME);
    }

    public static function getMainHouseImage($houseID): string
    {
        define("HOUSEIMG", "img/casas/");
        $img = self::getIMG(HOUSEIMG, $houseID);
        if ($img != null) {
            return $img;
        }
        return HOUSEIMG . "placeholder.jpg";
    }

    public static function MBtoB($n)
    {
        return $n * 1000000;
    }
}
