<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use App\Models\TeacherModel;
use App\Models\FacilityModel;
use App\Models\GalleryModel;
use App\Models\RegistrationModel;
use App\Models\ArticleModel;
use PhpOffice\PhpWord\TemplateProcessor;

class PublicController extends BaseController
{
    protected $profileModel;
    protected $teacherModel;
    protected $facilityModel;
    protected $galleryModel;
    protected $registrationModel;
    protected $articleModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
        $this->teacherModel = new TeacherModel();
        $this->facilityModel = new FacilityModel();
        $this->galleryModel = new GalleryModel();
        $this->registrationModel = new RegistrationModel();
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        try {
            $profile = $this->profileModel->getProfile(1);
            $teacher = $this->teacherModel->getTeacher(1);
            $facility = $this->facilityModel->getFacility(1);
            $gallery = $this->galleryModel->getGallery(1);



            $data = [
                'profile' => $profile,
                'teacher' => $teacher,
                'facility' => $facility,
                'gallery' => $gallery
            ];

            return view('public/main', $data);
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

    public function registration()
    {
        try {
            $profile = $this->profileModel->getProfile(1);

            $data = [
                'profile' => $profile
            ];

            return view('public/registration', $data);
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

    public function article($page)
    {
        try {
            $profile = $this->profileModel->getProfile(1);
            $countData = $this->articleModel->getCount();

            $limit = 6;
            $start = ($limit * $page) - $limit;

            $article = $this->articleModel->getArticleLimit($start, $limit, 1);

            $data = [
                'profile' => $profile,
                'title' => 'Berita Sekolah',
                'article' => $article,
                'countPage' => ceil($countData / $limit),
                'page' => $page
            ];

            // dd($data);

            return view('public/article', $data);
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

    public function getArticle($id)
    {
        try {

            $data = [
                'status' => 'success',
                'article' => $this->articleModel->getArticleId($id)
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

    public function getAllArticle($page)
    {
        try {
            $article = $this->articleModel->getArticle(1);

            $data = [
                'article' => $article,
                'status' => 'success',
            ];

            echo json_encode($data);
        } catch (\Exception $e) {

            $errorCode = $e->getCode();
            $message = $e->getMessage();

            $data = [
                'errorCode' => $errorCode,
                'message' => $message,
                'status' => 'error',

            ];

            echo json_encode($data);
        }
    }

    public function newRegist()
    {
        try {
            $profile = $this->profileModel->getProfile(1);

            $fullName = $this->request->getPost('fullName');
            $name = $this->request->getPost('name');
            $gender = $this->request->getPost('gender');
            $placeBirth = $this->request->getPost('placeBirth');
            $dateBirth = $this->request->getPost('dateBirth');
            $religion = $this->request->getPost('religion');
            $civics = $this->request->getPost('civics');
            $childNumber = $this->request->getPost('childNumber');
            $siblings = $this->request->getPost('siblings');
            $halfSiblings = $this->request->getPost('halfSiblings');
            $adoptedSiblings = $this->request->getPost('adoptedSiblings');
            $language = $this->request->getPost('language');
            $weight = $this->request->getPost('weight');
            $height = $this->request->getPost('height');
            $bloodLine = $this->request->getPost('bloodLine');
            $disease = $this->request->getPost('disease');
            $phoneNumber = $this->request->getPost('phoneNumber');
            $place = $this->request->getPost('place');
            $address = $this->request->getPost('address');

            $fatherName = $this->request->getPost('fatherName');
            $motherName = $this->request->getPost('motherName');
            $fatherEdu = $this->request->getPost('fatherEdu');
            $motherEdu = $this->request->getPost('motherEdu');
            $fatherJob = $this->request->getPost('fatherJob');
            $motherJob = $this->request->getPost('motherJob');
            $guardName = $this->request->getPost('guardName');
            $guardEdu = $this->request->getPost('guardEdu');
            $guardConnect = $this->request->getPost('guardConnect');
            $guardjob = $this->request->getPost('guardjob');

            $class = '1 (Satu)';
            $year = $profile->year;

            $fcKK = $this->request->getFile('fcKK');
            $fcAK = $this->request->getFile('fcAK');
            $fcKTP = $this->request->getFile('fcKTP');

            $placeBirth = $this->request->getPost('placeBirth');
            $dateBirth = strval($this->request->getPost('dateBirth'));

            $formattedDate = date('d F Y', strtotime($dateBirth));

            $bulanIndonesia = array(
                'January'   => 'Januari',
                'February'  => 'Februari',
                'March'     => 'Maret',
                'April'     => 'April',
                'May'       => 'Mei',
                'June'      => 'Juni',
                'July'      => 'Juli',
                'August'    => 'Agustus',
                'September' => 'September',
                'October'   => 'Oktober',
                'November'  => 'November',
                'December'  => 'Desember'
            );

            $formattedDate = strtr($formattedDate, $bulanIndonesia);
            $placeDateOfBirth =  $placeBirth . ', ' .  $formattedDate;

            $curDate = date('d F Y');
            $dateRegist = strtr($curDate, $bulanIndonesia);

            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if ($fcKK && $fcKK->getError() != 4) {
                if (in_array($fcKK->getMimeType(), $allowedTypes)) {
                    $newfcKK = $fcKK->getRandomName();
                    $fcKK->move('img/registration', $newfcKK);
                } else {
                    unlink($fcKK->getTempName());
                    $data = [
                        'status' => 'error',
                        'message' => 'fcKK',
                    ];
                    echo json_encode($data);
                    return;
                }
            } else {
                $data = [
                    'status' => 'error',
                    'message' => 'fcKK NF',
                ];
                echo json_encode($data);
                return;
            }

            if ($fcAK && $fcAK->getError() != 4) {
                if (in_array($fcAK->getMimeType(), $allowedTypes)) {
                    $newfcAK = $fcAK->getRandomName();
                    $fcAK->move('img/registration', $newfcAK);
                } else {
                    unlink($fcAK->getTempName());
                    $data = [
                        'status' => 'error',
                        'message' => 'fcAK',
                    ];
                    echo json_encode($data);
                    return;
                }
            } else {
                $data = [
                    'status' => 'error',
                    'message' => 'fcAK NF',
                ];
                echo json_encode($data);
                return;
            }

            if ($fcKTP && $fcKTP->getError() != 4) {
                if (in_array($fcKTP->getMimeType(), $allowedTypes)) {
                    $newfcKTP = $fcKTP->getRandomName();
                    $fcKTP->move('img/registration', $newfcKTP);
                } else {
                    unlink($fcKTP->getTempName());
                    $data = [
                        'status' => 'error',
                        'message' => 'fcKTP'
                    ];
                    echo json_encode($data);
                    return;
                }
            } else {
                $data = [
                    'status' => 'error',
                    'message' => 'fcKTP NF'
                ];
                echo json_encode($data);
                return;
            }

            $registCode = $this->generateCode();

            $fileName = $this->createDocx($fullName, $name, $gender, $placeDateOfBirth, $religion, $civics, $childNumber, $siblings, $halfSiblings, $adoptedSiblings, $language, $weight, $height, $bloodLine, $disease, $address, $phoneNumber, $place, $fatherName, $motherName, $fatherEdu, $motherEdu, $fatherJob, $motherJob, $guardName, $guardEdu, $guardConnect, $guardjob, $dateRegist, $class, $year, $registCode);

            if ($fileName) {
                $data = [
                    'id_registration' => '',
                    'fullName' => $fullName,
                    'name' => $name,
                    'gender' => $gender,
                    'placeDateOfBirth' => $placeDateOfBirth,
                    'religion' => $religion,
                    'civics' => $civics,
                    'childNumber' => $childNumber,
                    'siblings' => $siblings,
                    'halfSiblings' => $halfSiblings,
                    'adoptedSiblings' => $adoptedSiblings,
                    'language' => $language,
                    'weight' => $weight,
                    'height' => $height,
                    'bloodLine' => $bloodLine,
                    'disease' => $disease,
                    'address' => $address,
                    'phoneNumber' => $phoneNumber,
                    'place' => $place,
                    'fatherName' => $fatherName,
                    'motherName' => $motherName,
                    'fatherEdu' => $fatherEdu,
                    'motherEdu' => $motherEdu,
                    'fatherJob' => $fatherJob,
                    'motherJob' => $motherJob,
                    'guardName' => $guardName,
                    'guardEdu' => $guardEdu,
                    'guardConnect' => $guardConnect,
                    'guardjob' => $guardjob,
                    'fcKK' => $newfcKK,
                    'fcAK' => $newfcAK,
                    'fcKTP' => $newfcKTP,
                    'dateRegist' => $dateRegist,
                    'class' => $class,
                    'year' => $year,
                    'ouputFile' => $fileName,
                    'registCode' => $registCode,
                    'registStatus' => 'Sedang Diverifikasi',
                ];

                $this->registrationModel->insert($data);

                $data = [
                    'status' => 'success',
                    'registCode' => $registCode,
                ];
                echo json_encode($data);
            } else {
                $data = [
                    'status' => 'error',
                    'message' => 'Nothing',
                ];
                echo json_encode($data);
                return;
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();

            $data = [
                'status' => 'catch',
                'message' => $message,
            ];
            echo json_encode($data);
            return;
        }
    }

    public function createDocx($fullName, $name, $gender, $placeDateOfBirth, $religion, $civics, $childNumber, $siblings, $halfSiblings, $adoptedSiblings, $language, $weight, $height, $bloodLine, $disease, $address, $phoneNumber, $place, $fatherName, $motherName, $fatherEdu, $motherEdu, $fatherJob, $motherJob, $guardName, $guardEdu, $guardConnect, $guardjob, $dateRegist, $class, $year, $registCode)
    {
        try {
            $random = $this->generateRandomString(5);
            $fileName = "{$registCode}_{$fullName}_{$random}";
            $fileDOCX = "{$registCode}_{$fullName}_{$random}.docx";

            $templatePath = FCPATH . 'form' . DIRECTORY_SEPARATOR . 'template.docx';
            $outputDOCXPath = FCPATH . 'form' . DIRECTORY_SEPARATOR . 'docx' . DIRECTORY_SEPARATOR . $fileDOCX;

            copy($templatePath, $outputDOCXPath);

            $templateProcessor = new TemplateProcessor($outputDOCXPath);

            $templateProcessor->setValue('year', $year);
            $templateProcessor->setValue('class', $class);
            $templateProcessor->setValue('fullName', $fullName);
            $templateProcessor->setValue('name', $name);
            $templateProcessor->setValue('gender', $gender);
            $templateProcessor->setValue('placeDateOfBirth', $placeDateOfBirth);
            $templateProcessor->setValue('religion', $religion);
            $templateProcessor->setValue('civics', $civics);
            $templateProcessor->setValue('childNumber', $childNumber);
            $templateProcessor->setValue('siblings', $siblings);
            $templateProcessor->setValue('halfSiblings', $halfSiblings);
            $templateProcessor->setValue('adoptedSiblings', $adoptedSiblings);
            $templateProcessor->setValue('language', $language);
            $templateProcessor->setValue('weight', $weight);
            $templateProcessor->setValue('height', $height);
            $templateProcessor->setValue('bloodLine', $bloodLine);
            $templateProcessor->setValue('disease', $disease);
            $templateProcessor->setValue('addressPhoneNumber', $address . ',' . $phoneNumber);
            $templateProcessor->setValue('place', $place);
            $templateProcessor->setValue('fatherName', $fatherName);
            $templateProcessor->setValue('motherName', $motherName);
            $templateProcessor->setValue('fatherEdu', $fatherEdu);
            $templateProcessor->setValue('motherEdu', $motherEdu);
            $templateProcessor->setValue('fatherJob', $fatherJob);
            $templateProcessor->setValue('motherJob', $motherJob);
            $templateProcessor->setValue('guardName', $guardName);
            $templateProcessor->setValue('guardEdu', $guardEdu);
            $templateProcessor->setValue('guardConnect', $guardConnect);
            $templateProcessor->setValue('guardjob', $guardjob);
            $templateProcessor->setValue('dateRegist', $dateRegist);
            $templateProcessor->setValue('guardNameSign', $guardName);

            $templateProcessor->saveAs($outputDOCXPath);

            return $fileName;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function generateRandomString($length)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    private function generateCode()
    {
        $tanggal = date("dmy");

        $randomPart = $this->generateRandomString(4);

        $code = $tanggal . '-' . $randomPart;

        return $code;
    }

    public function getStatausRegist($code)
    {
        $result = $this->registrationModel->getRegistWithCode($code);

        if ($result) {
            $data = [
                'status' => 'success',
                'fullName' => $result['fullName'],
                'registStatus' => $result['registStatus'],
            ];
        } else {
            $data = [
                'status' => 'error',
            ];
        }

        echo json_encode($data);
    }

    public function downloadForm($code)
    {
        try {
            $result = $this->registrationModel->getRegistWithCode($code);

            if ($result) {
                $fileName = $result['ouputFile'] . '.docx';

                $fileDir = FCPATH . 'form' . DIRECTORY_SEPARATOR . 'docx' . DIRECTORY_SEPARATOR . $fileName;

                if (is_file($fileDir)) {
                    return $this->response->download($fileDir, null);
                } else {
                    $data = [
                        'errorCode' => '404',
                        'message' => 'Not Found'
                    ];

                    return view('myError/error', $data);
                }
            }
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

    public function downloadData($fileName)
    {
        try {
            $fileDir = FCPATH . 'img' . DIRECTORY_SEPARATOR . 'registration' . DIRECTORY_SEPARATOR . $fileName;

            if (is_file($fileDir)) {
                return $this->response->download($fileDir, null);
            } else {
                $data = [
                    'errorCode' => '404',
                    'message' => 'Not Found'
                ];

                return view('myError/error', $data);
            }
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
}
