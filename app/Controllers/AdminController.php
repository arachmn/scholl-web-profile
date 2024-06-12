<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use App\Models\TeacherModel;
use App\Models\FacilityModel;
use App\Models\GalleryModel;
use App\Models\RegistrationModel;
use App\Models\AdminModel;
use App\Models\ArticleModel;

class AdminController extends BaseController
{
    protected $facilityModel;
    protected $profileModel;
    protected $teacherModel;
    protected $galleryModel;
    protected $registrationModel;
    protected $adminModel;
    protected $articleModel;
    protected $session;

    public function __construct()
    {
        $this->facilityModel = new FacilityModel();
        $this->profileModel = new ProfileModel();
        $this->teacherModel = new TeacherModel();
        $this->galleryModel = new GalleryModel();
        $this->registrationModel = new RegistrationModel();
        $this->adminModel = new AdminModel();
        $this->articleModel = new ArticleModel();

        $this->session = \Config\Services::session();
    }

    // Dashboard Start
    public function index()
    {
        try {
            $data = [
                'profile' => $this->profileModel->getProfile(1),
                'regist' => $this->registrationModel->getCount(),
                'facility' => $this->facilityModel->getCount(),
                'teacher' => $this->teacherModel->getCount(),
                'gallery' => $this->galleryModel->getCount(),
            ];
            return view('admin/dashboard', $data);
        } catch (\Exception $e) {

            $errorCode = $e->getCode();
            $message = $e->getMessage();

            $data = [
                'errorCode' => $errorCode,
                'message' => $message
            ];

            return view('myError/error', $data);
        }
    }
    // Dashboard End

    // Profile Start
    public function profile()
    {
        $data = [
            'profile' => $this->profileModel->getProfile(1),
            'title' => "Profil Sekolah"
        ];
        return view('admin/profile', $data);
    }

    public function saveProfile()
    {
        try {
            $idProfile = $this->request->getPost('idProfile');

            $postData = $this->request->getPost([
                'name',
                'panel',
                'email',
                'phone',
                'address',
                'logo',
                'banner1',
                'banner2',
                'banner3',
                'textBanner1',
                'textBanner2',
                'textBanner3',
                'subTextBanner1',
                'subTextBanner2',
                'subTextBanner3',
                'visi',
                'misi',
                'about',
                'youtubeLink',
                'facebookLink',
                'instagramLink',
                'ppdb',
                'year'
            ]);

            $fileFields = ['logo', 'banner1', 'banner2', 'banner3', 'about'];
            $uploadedFiles = [];

            foreach ($fileFields as $field) {
                $file = $this->request->getFile($field);

                if ($file->getError() != 4) {
                    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

                    if (in_array($file->getMimeType(), $allowedTypes)) {
                        $oldFile = $this->profileModel->select($field)->where('id_profile', $idProfile)->get()->getRow()->$field;

                        if ($oldFile != "$field") {
                            $oldFilePath = FCPATH . 'img' . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR . $oldFile;

                            if (is_file($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }

                        $newFileName = $file->getRandomName();
                        $file->move('img/profile', $newFileName);
                        $uploadedFiles[$field] = $newFileName;
                    } else {
                        unlink($file->getTempName());
                        return redirect()->to(base_url('admin/profil'))->with('failed', 'Data gagal disimpan.');
                    }
                } else {
                    $uploadedFiles[$field] = $this->profileModel->select($field)->where('id_profile', $idProfile)->get()->getRow()->$field;
                }
            }

            $data = array_merge($postData, $uploadedFiles);

            $this->profileModel->where('id_profile', $idProfile)->set($data)->update();

            return redirect()->to(base_url('admin/profil'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/profil'))->with('failed', $e->getMessage());
        }
    }
    // Profile End

    // Article Start
    public function article()
    {
        try {

            if ($this->session->has('id_admin')) {
                $idAdmin = $this->session->get('id_admin');
            } else {
                $idAdmin = '1';
            }

            $article = $this->articleModel->getArticle();
            $countData = $this->articleModel->getCount();
            $data = [
                'profile' => $this->profileModel->getProfile(1),
                'title' => 'Berita Sekolah',
                'article' => $article,
                'countData' => $countData,
                'idAdmin' => $idAdmin,
            ];

            return view('admin/article', $data);
        } catch (\Exception $e) {

            $errorCode = $e->getCode();
            $message = $e->getMessage();

            $data = [
                'errorCode' => $errorCode,
                'message' => $message
            ];

            return view('myError/error', $data);
        }
    }

    public function deleteArticle($idArticle)
    {
        try {
            $query =  $this->articleModel->getArticleId($idArticle);
            $oldFile =  $query['imgArticle'];
            $result = $this->articleModel->where('id_article', $idArticle)->delete();

            if ($oldFile != 'article.jpg') {
                $fileToCheck = FCPATH . 'img' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . $oldFile;
                if (is_file($fileToCheck)) {
                    unlink('img/article/' . $oldFile);
                }
            }

            if ($result) {
                return redirect()->to(base_url('admin/berita'))->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->to(base_url('admin/berita'))->with('failed', 'Data gagal dihapus.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/berita'))->with('failed', $e->getMessage());
        }
    }

    public function statusArticle($idArticle)
    {
        try {
            $result =  $this->articleModel->getArticleId($idArticle);

            if ($result) {
                if ($result['status'] == 1) {
                    $result['status'] = 0;
                } elseif ($result['status'] == 0) {
                    $result['status'] = 1;
                } else {
                    $result['status'] = 0;
                }
                $data = [
                    'status' => $result['status'],
                ];

                $this->articleModel->where('id_article', $idArticle)->set($data)->update();

                return redirect()->to(base_url('admin/berita'))->with('success', 'Data berhasil diperbaharui.');
            } else {
                return redirect()->to(base_url('admin/berita'))->with('failed', 'Data gagal diperbaharui.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/berita'))->with('failed', $e->getMessage());
        }
    }

    public function saveArticle()
    {
        try {
            if ($this->session->has('id_admin')) {
                $idAdmin = $this->session->get('id_admin');
            } else {
                $idAdmin = '1';
            }

            $status = $this->request->getPost('status');
            $title = $this->request->getPost('title');
            $content = $this->request->getPost('content');
            $image = $this->request->getFile('imgArticle');

            $dateInput = strval($this->request->getPost('date'));
            $date = date('d-m-Y', strtotime($dateInput));


            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($image && $image->getError() != 4) {
                if (in_array($image->getMimeType(), $allowedTypes)) {
                    $newimage = $image->getRandomName();
                    $image->move('img/article', $newimage);
                } else {
                    unlink($image->getTempName());
                    return redirect()->to(base_url('admin/berita'))->with('failed', 'Data gagal disimpan.');
                }
            } else {
                return redirect()->to(base_url('admin/berita'))->with('failed', 'Data gagal disimpan.');
            }

            $data = [
                'id_admin' => $idAdmin,
                'status' => $status,
                'title' => $title,
                'content' => $content,
                'date' => $date,
                'imgArticle' => $newimage,
            ];

            $this->articleModel->insert($data);


            return redirect()->to(base_url('admin/berita'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/berita'))->with('failed', $e->getMessage());
        }
    }

    public function editArticle($idArticle)
    {
        try {
            if ($this->session->has('id_admin')) {
                $idAdmin = $this->session->get('id_admin');
            } else {
                $idAdmin = '1';
            }

            $title = $this->request->getPost('title2');
            $content = $this->request->getPost('content2');
            $image = $this->request->getFile('imgArticle2');

            $query = $this->articleModel->getArticleId($idArticle);
            $oldImage = $query['imgArticle'];


            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($image && $image->getError() != 4) {
                if (in_array($image->getMimeType(), $allowedTypes)) {
                    $newimage = $image->getRandomName();
                    $image->move('img/article', $newimage);
                } else {
                    unlink($image->getTempName());
                    return redirect()->to(base_url('admin/berita'))->with('failed', 'Data gagal disimpan.');
                }
            } else {
                if ($idArticle) {
                    $newimage = $oldImage;
                } else {
                    $newimage = 'article.jpg';
                }
            }

            $data = [
                'id_admin' => $idAdmin,
                'title' => $title,
                'content' => $content,
                'imgArticle' => $newimage,
            ];

            if ($this->request->getPost('date2')) {
                $dateInput = strval($this->request->getPost('date2'));
                $date = date('d-m-Y', strtotime($dateInput));
                $data['date'] = $date;
            }

            $this->articleModel->where('id_article', $idArticle)->set($data)->update();


            return redirect()->to(base_url('admin/berita'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/berita'))->with('failed', $e->getMessage());
        }
    }

    public function getArticle($idArticle)
    {
        try {

            $data = [
                'status' => 'success',
                'article' => $this->articleModel->getArticleId($idArticle),
                'id_article' => $idArticle,
            ];

            echo json_encode($data);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];

            echo json_encode($data);
        }
    }
    // Article End

    // Facility Start
    public function facility()
    {
        try {

            if ($this->session->has('id_admin')) {
                $idAdmin = $this->session->get('id_admin');
            } else {
                $idAdmin = '1';
            }

            $facility = $this->facilityModel->getFacility();
            $countData = $this->facilityModel->getCount();
            $data = [
                'profile' => $this->profileModel->getProfile(1),
                'title' => 'Fasilitas Sekolah',
                'facility' => $facility,
                'countData' => $countData,
                'idAdmin' => $idAdmin,
            ];

            return view('admin/facility', $data);
        } catch (\Exception $e) {

            $errorCode = $e->getCode();
            $message = $e->getMessage();

            $data = [
                'errorCode' => $errorCode,
                'message' => $message
            ];

            return view('myError/error', $data);
        }
    }

    public function deleteFacility($idFacility)
    {
        try {
            $query =  $this->facilityModel->getFacilityId($idFacility);
            $oldFile =  $query['image'];
            $result = $this->facilityModel->where('id_facility', $idFacility)->delete();

            if ($oldFile != 'facility.jpg') {
                $fileToCheck = FCPATH . 'img' . DIRECTORY_SEPARATOR . 'facility' . DIRECTORY_SEPARATOR . $oldFile;
                if (is_file($fileToCheck)) {
                    unlink('img/facility/' . $oldFile);
                }
            }

            if ($result) {
                return redirect()->to(base_url('admin/fasilitas'))->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->to(base_url('admin/fasilitas'))->with('failed', 'Data gagal dihapus.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/fasilitas'))->with('failed', $e->getMessage());
        }
    }

    public function statusFacility($idFacility)
    {
        try {
            $result =  $this->facilityModel->getFacilityId($idFacility);

            if ($result) {
                if ($result['status'] == 1) {
                    $result['status'] = 0;
                } elseif ($result['status'] == 0) {
                    $result['status'] = 1;
                } else {
                    $result['status'] = 0;
                }
                $data = [
                    'status' => $result['status'],
                ];

                $this->facilityModel->where('id_facility', $idFacility)->set($data)->update();

                return redirect()->to(base_url('admin/fasilitas'))->with('success', 'Data berhasil diperbaharui.');
            } else {
                return redirect()->to(base_url('admin/fasilitas'))->with('failed', 'Data gagal diperbaharui.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/fasilitas'))->with('failed', $e->getMessage());
        }
    }

    public function saveFacility()
    {
        try {
            if ($this->session->has('id_admin')) {
                $idAdmin = $this->session->get('id_admin');
            } else {
                $idAdmin = '1';
            }

            $status = $this->request->getPost('status');
            $title = $this->request->getPost('title');
            $description = $this->request->getPost('description');
            $cuality = $this->request->getPost('cuality');
            $image = $this->request->getFile('image');


            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($image && $image->getError() != 4) {
                if (in_array($image->getMimeType(), $allowedTypes)) {
                    $newimage = $image->getRandomName();
                    $image->move('img/facility', $newimage);
                } else {
                    unlink($image->getTempName());
                    return redirect()->to(base_url('admin/fasilitas'))->with('failed', 'Data gagal disimpan.');
                }
            } else {
                return redirect()->to(base_url('admin/fasilitas'))->with('failed', 'Data gagal disimpan.');
            }

            $data = [
                'id_admin' => $idAdmin,
                'status' => $status,
                'title' => $title,
                'description' => $description,
                'cuality' => $cuality,
                'image' => $newimage,
            ];

            $this->facilityModel->insert($data);


            return redirect()->to(base_url('admin/fasilitas'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/fasilitas'))->with('failed', $e->getMessage());
        }
    }

    public function editFacility($idFacility)
    {
        try {
            if ($this->session->has('id_admin')) {
                $idAdmin = $this->session->get('id_admin');
            } else {
                $idAdmin = '1';
            }

            $title = $this->request->getPost('title2');
            $description = $this->request->getPost('description2');
            $cuality = $this->request->getPost('cuality2');
            $image = $this->request->getFile('image2');

            $query = $this->facilityModel->getFacilityId($idFacility);
            $oldImage = $query['image'];


            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($image && $image->getError() != 4) {
                if (in_array($image->getMimeType(), $allowedTypes)) {
                    $newimage = $image->getRandomName();
                    $image->move('img/facility', $newimage);
                } else {
                    unlink($image->getTempName());
                    return redirect()->to(base_url('admin/fasilitas'))->with('failed', 'Data gagal disimpan.');
                }
            } else {
                if ($idFacility) {
                    $newimage = $oldImage;
                } else {
                    $newimage = 'facility.jpg';
                }
            }

            $data = [
                'id_admin' => $idAdmin,
                'title' => $title,
                'description' => $description,
                'cuality' => $cuality,
                'image' => $newimage,
            ];

            $this->facilityModel->where('id_facility', $idFacility)->set($data)->update();


            return redirect()->to(base_url('admin/fasilitas'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/fasilitas'))->with('failed', $e->getMessage());
        }
    }

    public function getFacility($idFacility)
    {
        try {

            $data = [
                'status' => 'success',
                'facility' => $this->facilityModel->getFacilityId($idFacility),
                'id_facility' => $idFacility,
            ];

            echo json_encode($data);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];

            echo json_encode($data);
        }
    }

    public function getAdmin($idAdmin)
    {
        try {

            $data = [
                'status' => 'success',
                'admin' => $this->adminModel->getAdmin($idAdmin),
                'idAdmin' => $idAdmin,
            ];

            echo json_encode($data);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];

            echo json_encode($data);
        }
    }
    // Facility End

    // Teacher Start
    public function teacher()
    {
        try {

            $teacher = $this->teacherModel->getTeacher();
            $countData = $this->teacherModel->getCount();
            $data = [
                'profile' => $this->profileModel->getProfile(1),
                'title' => 'Guru Sekolah',
                'teacher' => $teacher,
                'countData' => $countData,
            ];

            return view('admin/teacher', $data);
        } catch (\Exception $e) {

            $errorCode = $e->getCode();
            $message = $e->getMessage();

            $data = [
                'errorCode' => $errorCode,
                'message' => $message
            ];

            return view('myError/error', $data);
        }
    }

    public function getTeacher($id)
    {
        try {

            $data = [
                'status' => 'success',
                'teacher' => $this->teacherModel->getTeacherId($id)
            ];

            echo json_encode($data);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];

            echo json_encode($data);
        }
    }

    public function saveTeacher()
    {
        try {

            $nrp = $this->request->getPost('nrp');
            $name = $this->request->getPost('name');
            $phone = $this->request->getPost('phone');
            $job = $this->request->getPost('job');
            $status = $this->request->getPost('status');
            $image = $this->request->getFile('image');


            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($image && $image->getError() != 4) {
                if (in_array($image->getMimeType(), $allowedTypes)) {
                    $newimage = $image->getRandomName();
                    $image->move('img/teacher', $newimage);
                } else {
                    unlink($image->getTempName());
                    return redirect()->to(base_url('admin/daftar-guru'))->with('failed', 'Data gagal disimpan.');
                }
            } else {
                return redirect()->to(base_url('admin/daftar-guru'))->with('failed', 'Data gagal disimpan.');
            }

            $data = [
                'nrp' => $nrp,
                'name' => $name,
                'phone' => $phone,
                'job' => $job,
                'status' => $status,
                'image' => $newimage,
            ];

            $this->teacherModel->insert($data);


            return redirect()->to(base_url('admin/daftar-guru'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/daftar-guru'))->with('failed', $e->getMessage());
        }
    }

    public function editTeacher($idTeacher)
    {
        try {

            $nrp = $this->request->getPost('nrp2');
            $name = $this->request->getPost('name2');
            $phone = $this->request->getPost('phone2');
            $job = $this->request->getPost('job2');
            $image = $this->request->getFile('image2');

            $query = $this->teacherModel->getTeacherId($idTeacher);
            $oldImage = $query['image'];


            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($image && $image->getError() != 4) {
                if (in_array($image->getMimeType(), $allowedTypes)) {
                    $newimage = $image->getRandomName();
                    $image->move('img/teacher', $newimage);
                } else {
                    unlink($image->getTempName());
                    return redirect()->to(base_url('admin/daftar-guru'))->with('failed', 'Data gagal disimpan.');
                }
            } else {
                if ($idTeacher) {
                    $newimage = $oldImage;
                } else {
                    $newimage = 'teacher.jpg';
                }
            }

            $data = [
                'nrp' => $nrp,
                'name' => $name,
                'phone' => $phone,
                'job' => $job,
                'image' => $newimage,
            ];

            $this->teacherModel->where('id_teacher', $idTeacher)->set($data)->update();


            return redirect()->to(base_url('admin/daftar-guru'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/daftar-guru'))->with('failed', $e->getMessage());
        }
    }

    public function deleteTeacher($idTeacher)
    {
        try {
            $query =  $this->teacherModel->getTeacherId($idTeacher);
            $oldFile =  $query['image'];
            $result = $this->teacherModel->where('id_teacher', $idTeacher)->delete();

            if ($oldFile != 'teacher.jpg') {
                $fileToCheck = FCPATH . 'img' . DIRECTORY_SEPARATOR . 'teacher' . DIRECTORY_SEPARATOR . $oldFile;
                if (is_file($fileToCheck)) {
                    unlink('img/teacher/' . $oldFile);
                }
            }

            if ($result) {
                return redirect()->to(base_url('admin/daftar-guru'))->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->to(base_url('admin/daftar-guru'))->with('failed', 'Data gagal dihapus.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/daftar-guru'))->with('failed', $e->getMessage());
        }
    }

    public function statusTeacher($idTeacher)
    {
        try {
            $result =  $this->teacherModel->getTeacherId($idTeacher);

            if ($result) {
                if ($result['status'] == 1) {
                    $result['status'] = 0;
                } elseif ($result['status'] == 0) {
                    $result['status'] = 1;
                } else {
                    $result['status'] = 0;
                }
                $data = [
                    'status' => $result['status'],
                ];

                $this->teacherModel->where('id_teacher', $idTeacher)->set($data)->update();

                return redirect()->to(base_url('admin/daftar-guru'))->with('success', 'Data berhasil diperbaharui.');
            } else {
                return redirect()->to(base_url('admin/daftar-guru'))->with('failed', 'Data gagal diperbaharui.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/daftar-guru'))->with('failed', $e->getMessage());
        }
    }
    // Teacher End

    // Gallery Start
    public function gallery()
    {
        try {

            $gallery = $this->galleryModel->getGallery();
            $countData = $this->galleryModel->getCount();
            $data = [
                'profile' => $this->profileModel->getProfile(1),
                'title' => 'Galeri Sekolah',
                'gallery' => $gallery,
                'countData' => $countData,
            ];

            return view('admin/gallery', $data);
        } catch (\Exception $e) {

            $errorCode = $e->getCode();
            $message = $e->getMessage();

            $data = [
                'errorCode' => $errorCode,
                'message' => $message
            ];

            return view('myError/error', $data);
        }
    }

    public function getGallery($id)
    {
        try {

            $data = [
                'status' => 'success',
                'gallery' => $this->galleryModel->getGalleryId($id)
            ];

            echo json_encode($data);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];

            echo json_encode($data);
        }
    }

    public function saveGallery()
    {
        try {

            if ($this->session->has('id_admin')) {
                $idAdmin = $this->session->get('id_admin');
            } else {
                $idAdmin = '1';
            }

            $title = $this->request->getPost('title');
            $status = $this->request->getPost('status');
            $image = $this->request->getFile('image');

            $dateInput = strval($this->request->getPost('date'));
            $date = date('d-m-Y', strtotime($dateInput));

            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($image && $image->getError() != 4) {
                if (in_array($image->getMimeType(), $allowedTypes)) {
                    $newimage = $image->getRandomName();
                    $image->move('img/gallery', $newimage);
                } else {
                    unlink($image->getTempName());
                    return redirect()->to(base_url('admin/galeri-sekolah'))->with('failed', 'Data gagal disimpan.');
                }
            } else {
                return redirect()->to(base_url('admin/galeri-sekolah'))->with('failed', 'Data gagal disimpan.');
            }

            $data = [
                'id_admin' => $idAdmin,
                'date' => $date,
                'title' => $title,
                'status' => $status,
                'image' => $newimage,
            ];

            $this->galleryModel->insert($data);


            return redirect()->to(base_url('admin/galeri-sekolah'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/galeri-sekolah'))->with('failed', $e->getMessage());
        }
    }

    public function editGallery($idGallery)
    {
        try {
            if ($this->session->has('id_admin')) {
                $idAdmin = $this->session->get('id_admin');
            } else {
                $idAdmin = '1';
            }

            $title = $this->request->getPost('title2');
            $image = $this->request->getFile('image2');

            $query = $this->galleryModel->getGalleryId($idGallery);
            $oldImage = $query['image'];


            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($image && $image->getError() != 4) {
                if (in_array($image->getMimeType(), $allowedTypes)) {
                    $newimage = $image->getRandomName();
                    $image->move('img/gallery', $newimage);
                } else {
                    unlink($image->getTempName());
                    return redirect()->to(base_url('admin/galeri-sekolah'))->with('failed', 'Data gagal disimpan.');
                }
            } else {
                if ($idGallery) {
                    $newimage = $oldImage;
                } else {
                    $newimage = 'gallery.jpg';
                }
            }

            $data = [
                'id_admin' => $idAdmin,
                'title' => $title,
                'image' => $newimage,
            ];

            if ($this->request->getPost('date2')) {
                $dateInput = strval($this->request->getPost('date2'));
                $date = date('d-m-Y', strtotime($dateInput));
                $data['date'] = $date;
            }

            $this->galleryModel->where('id_gallery', $idGallery)->set($data)->update();


            return redirect()->to(base_url('admin/galeri-sekolah'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/galeri-sekolah'))->with('failed', $e->getMessage());
        }
    }

    public function deleteGallery($idGallery)
    {
        try {
            $query =  $this->galleryModel->getGalleryId($idGallery);
            $oldFile =  $query['image'];
            $result = $this->galleryModel->where('id_gallery', $idGallery)->delete();

            if ($oldFile != 'gallery.jpg') {
                $fileToCheck = FCPATH . 'img' . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR . $oldFile;
                if (is_file($fileToCheck)) {
                    unlink('img/gallery/' . $oldFile);
                }
            }

            if ($result) {
                return redirect()->to(base_url('admin/galeri-sekolah'))->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->to(base_url('admin/galeri-sekolah'))->with('failed', 'Data gagal dihapus.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/galeri-sekolah'))->with('failed', $e->getMessage());
        }
    }

    public function statusGallery($idGallery)
    {
        try {
            $result =  $this->galleryModel->getGalleryId($idGallery);

            if ($result) {
                if ($result['status'] == 1) {
                    $result['status'] = 0;
                } elseif ($result['status'] == 0) {
                    $result['status'] = 1;
                } else {
                    $result['status'] = 0;
                }
                $data = [
                    'status' => $result['status'],
                ];

                $this->galleryModel->where('id_gallery', $idGallery)->set($data)->update();

                return redirect()->to(base_url('admin/galeri-sekolah'))->with('success', 'Data berhasil diperbaharui.');
            } else {
                return redirect()->to(base_url('admin/galeri-sekolah'))->with('failed', 'Data gagal diperbaharui.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/galeri-sekolah'))->with('failed', $e->getMessage());
        }
    }
    // Gallery End

    // Admin Start
    public function admin()
    {
        try {

            $admin = $this->adminModel->getAdmin();
            $countData = $this->adminModel->getCount();
            $data = [
                'profile' => $this->profileModel->getProfile(1),
                'title' => 'Daftar Admin',
                'admin' => $admin,
                'countData' => $countData,
            ];

            return view('admin/admin', $data);
        } catch (\Exception $e) {

            $errorCode = $e->getCode();
            $message = $e->getMessage();

            $data = [
                'errorCode' => $errorCode,
                'message' => $message
            ];

            return view('myError/error', $data);
        }
    }

    public function getAdminData($id)
    {
        try {

            $data = [
                'status' => 'success',
                'admin' => $this->adminModel->getAdmin($id)
            ];

            echo json_encode($data);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];

            echo json_encode($data);
        }
    }

    public function saveAdmin()
    {
        try {

            $username = $this->request->getPost('username');
            $name = $this->request->getPost('name');
            $password = $this->request->getPost('password');
            $phone = $this->request->getPost('phone');
            $image = $this->request->getFile('image');


            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($image && $image->getError() != 4) {
                if (in_array($image->getMimeType(), $allowedTypes)) {
                    $newimage = $image->getRandomName();
                    $image->move('img/admin', $newimage);
                } else {
                    unlink($image->getTempName());
                    return redirect()->to(base_url('admin/admin'))->with('failed', 'Data gagal disimpan.');
                }
            } else {
                return redirect()->to(base_url('admin/admin'))->with('failed', 'Data gagal disimpan.');
            }

            $data = [
                'username' => $username,
                'name' => $name,
                'phone' => $phone,
                'password' => $password,
                'image' => $newimage,
            ];

            $this->adminModel->insert($data);


            return redirect()->to(base_url('admin/admin'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/admin'))->with('failed', $e->getMessage());
        }
    }

    public function editAdmin($idAdmin)
    {
        try {
            $username = $this->request->getPost('username2');
            $name = $this->request->getPost('name2');
            $password = $this->request->getPost('password2');
            $phone = $this->request->getPost('phone2');
            $image = $this->request->getFile('image2');

            $query = $this->adminModel->getAdmin($idAdmin);
            $oldImage = $query['image'];


            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($image && $image->getError() != 4) {
                if (in_array($image->getMimeType(), $allowedTypes)) {
                    $newimage = $image->getRandomName();
                    $image->move('img/gallery', $newimage);
                } else {
                    unlink($image->getTempName());
                    return redirect()->to(base_url('admin/admin'))->with('failed', 'Data gagal disimpan.');
                }
            } else {
                if ($idAdmin) {
                    $newimage = $oldImage;
                } else {
                    $newimage = 'admin.png';
                }
            }

            $data = [
                'username' => $username,
                'name' => $name,
                'password' => $password,
                'phone' => $phone,
                'image' => $newimage,
            ];

            $this->adminModel->where('id_admin', $idAdmin)->set($data)->update();


            return redirect()->to(base_url('admin/admin'))->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/admin'))->with('failed', $e->getMessage());
        }
    }

    public function deleteAdmin($idAdmin)
    {
        try {
            $query =  $this->adminModel->getAdmin($idAdmin);
            $oldFile =  $query['image'];
            $result = $this->adminModel->where('id_gallery', $idAdmin)->delete();

            if ($oldFile != 'gallery.jpg') {
                $fileToCheck = FCPATH . 'img' . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR . $oldFile;
                if (is_file($fileToCheck)) {
                    unlink('img/gallery/' . $oldFile);
                }
            }

            if ($result) {
                return redirect()->to(base_url('admin/admin'))->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->to(base_url('admin/admin'))->with('failed', 'Data gagal dihapus.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/admin'))->with('failed', $e->getMessage());
        }
    }
    // Admin End

    // Registration Start
    public function registration()
    {
        try {

            $registration = $this->registrationModel->getRegistration();
            $countData = $this->registrationModel->getCount();
            $data = [
                'profile' => $this->profileModel->getProfile(1),
                'title' => 'PPDB Online',
                'registration' => $registration,
                'countData' => $countData,
            ];

            return view('admin/registration', $data);
        } catch (\Exception $e) {

            $errorCode = $e->getCode();
            $message = $e->getMessage();

            $data = [
                'errorCode' => $errorCode,
                'message' => $message
            ];

            return view('myError/error', $data);
        }
    }

    public function getRegistration($id)
    {
        try {

            $data = [
                'status' => 'success',
                'registration' => $this->registrationModel->getRegistrationId($id)
            ];

            echo json_encode($data);
        } catch (\Exception $e) {
            $data = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];

            echo json_encode($data);
        }
    }

    public function statusRegistration($idRegistration)
    {
        try {
            $result =  $this->registrationModel->getRegistrationId($idRegistration);

            if ($result) {
                if ($result['registStatus'] == 'Sedang Diverifikasi') {
                    $status = 'Terverifikasi';
                } elseif ($result['registStatus'] == 'Terverifikasi') {
                    $status = 'Sedang Diverifikasi';
                } else {
                    $status = 'Terverifikasi';
                }
                $data = [
                    'registStatus' => $status,
                ];

                $this->registrationModel->where('id_registration', $idRegistration)->set($data)->update();

                return redirect()->to(base_url('admin/ppdb'))->with('success', 'Data berhasil diperbaharui.');
            } else {
                return redirect()->to(base_url('admin/ppdb'))->with('failed', 'Data gagal diperbaharui.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/ppdb'))->with('failed', $e->getMessage());
        }
    }

    public function deleteRegistration($idRegistration)
    {
        try {
            $query =  $this->registrationModel->getRegistrationId($idRegistration);
            $fcKK =  $query['fcKK'];
            $fcAK =  $query['fcAK'];
            $fcKTP =  $query['fcKTP'];
            $result = $this->registrationModel->where('id_registration', $idRegistration)->delete();

            $fileToCheck = FCPATH . 'form' . DIRECTORY_SEPARATOR . 'docx' . DIRECTORY_SEPARATOR . $fcKK;
            if (is_file($fileToCheck)) {
                unlink('form/docx/' . $fcKK);
            }
            $fileToCheck = FCPATH . 'form' . DIRECTORY_SEPARATOR . 'docx' . DIRECTORY_SEPARATOR . $fcAK;
            if (is_file($fileToCheck)) {
                unlink('form/docx/' . $fcAK);
            }
            $fileToCheck = FCPATH . 'form' . DIRECTORY_SEPARATOR . 'docx' . DIRECTORY_SEPARATOR . $fcKTP;
            if (is_file($fileToCheck)) {
                unlink('form/docx/' . $fcKTP);
            }

            if ($result) {
                return redirect()->to(base_url('admin/registration'))->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->to(base_url('admin/registration'))->with('failed', 'Data gagal dihapus.');
            }
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/registration'))->with('failed', $e->getMessage());
        }
    }
    // Registration End
}
