<?php

namespace App\Controllers;

use App\Models\StudentRecordModel;

class StudentRecord extends BaseController
{
    public $studentRecordModel; // model for student records
    public $validationRules; // validation rules for student records

    public function __construct()
    {
        // load form helper
        helper('form');

        // load the student record model
        $this->studentRecordModel = new StudentRecordModel();

        // set validation rules for student records
        $this->validationRules = [
            'studentID' => [
                'label' => 'Student ID',
                'rules' => 'required|regex_match[/^[ka]{1}[0-9]{7}$/]',
                'errors' => [
                    'required' => 'Student ID is required.',
                    'regex_match' => 'Student ID must start with "k" or "a" followed by 7 digits.'
                ]
            ],

            'firstName' => [
                'label' => 'First Name',
                'rules' => 'required|alpha|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'First Name is required.',
                    'alpha' => 'First Name must contain only alphabetic characters.',
                    'min_length' => 'First Name must be at least 2 characters long.',
                    'max_length' => 'First Name cannot exceed 50 characters.'
                ]
            ],

            'lastName' => [
                'label' => 'Last Name',
                'rules' => 'required|alpha|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'Last Name is required.',
                    'alpha' => 'Last Name must contain only alphabetic characters.',
                    'min_length' => 'Last Name must be at least 2 characters long.',
                    'max_length' => 'Last Name cannot exceed 50 characters.'
                ]
            ],

            'year' => [
                'label' => 'Year',
                'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[4]',
                'errors' => [
                    'required' => 'Year is required.',
                    'integer' => 'Year must be an integer.',
                    'greater_than_equal_to' => 'Year must be at least 1.',
                    'less_than_equal_to' => 'Year cannot exceed 4.'
                ]
            ],

            'section' => [
                'label' => 'Section',
                'rules' => 'required|in_list[A,B,C,D]',
                'errors' => [
                    'required' => 'Section is required.',
                    'in_list' => 'Section must be one of the following: A, B, C, D.'
                ]
            ],

            'projman' => [
                'label' => 'PROJMAN',
                'rules' => 'required|greater_than_equal_to[1.00]|less_than_equal_to[5.00]',
                'errors' => [
                    'required' => 'Project Management is required.',
                    'greater_than_equal_to' => 'Project Management must be at least 1.00.',
                    'less_than_equal_to' => 'Project Management cannot exceed 5.00.'
                ]
            ],

            'softeng2' => [
                'label' => 'SOFTENG2',
                'rules' => 'required|greater_than_equal_to[1.00]|less_than_equal_to[5.00]',
                'errors' => [
                    'required' => 'Software Engineering 2 is required.',
                    'greater_than_equal_to' => 'Software Engineering must be at least 1.00.',
                    'less_than_equal_to' => 'Software Engineering cannot exceed 5.00.'
                ]
            ],

            'elective2' => [
                'label' => 'ELECTIVE2',
                'rules' => 'required|greater_than_equal_to[1.00]|less_than_equal_to[5.00]',
                'errors' => [
                    'required' => 'Elective 2 is required.',
                    'greater_than_equal_to' => 'Elective must be at least 1.00.',
                    'less_than_equal_to' => 'Elective cannot exceed 5.00.'
                ]
            ],

            'netcom' => [
                'label' => 'NETCOM',
                'rules' => 'required|greater_than_equal_to[1.00]|less_than_equal_to[5.00]',
                'errors' => [
                    'required' => 'Network Communications is required.',
                    'greater_than_equal_to' => 'Network Communications must be at least 1.00.',
                    'less_than_equal_to' => 'Network Communications cannot exceed 5.00.'
                ]
            ],

            'prolang' => [
                'label' => 'PROLANG',
                'rules' => 'required|greater_than_equal_to[1.00]|less_than_equal_to[5.00]',
                'errors' => [
                    'required' => 'Programming Languages is required.',
                    'greater_than_equal_to' => 'Programming Languages must be at least 1.00.',
                    'less_than_equal_to' => 'Programming Languages cannot exceed 5.00.'
                ]
            ],
        ];

    }

    public function index()
    {
        // check if the user is logged in
        if (!session()->get('logged_in')) {
            // if not logged in, redirect to the login page
            return redirect()->to('Login');
        }

        // get all student records
        $data['studentRecord'] = $this->studentRecordModel->findAll();

        // return the view with the student records
        return view('dashboard', $data);
    }

    public function addStudentRecord()
    {
        // check if the request method is POST
        if($this->request->getMethod() == 'POST') {

            // validate the form data
            if (!$this->validate($this->validationRules)) {
                // if validation fails, get the errors
                $errors = $this->validator->getErrors();
                $errorMessages = implode("<br>", $errors);

                // set flashdata with error messages
                session()->setFlashdata('error', $errorMessages);

                // redirect to the student record page
                return redirect()->to('StudentRecord');
            }

            // sanitize and get the form data
            $dataForm = [
                "StudentID" => $this->request->getPost("studentID", FILTER_SANITIZE_STRING),
                "FirstName" => $this->request->getPost("firstName", FILTER_SANITIZE_STRING),
                "LastName" => $this->request->getPost("lastName", FILTER_SANITIZE_STRING),
                "Year" => $this->request->getPost("year", FILTER_SANITIZE_STRING),
                "Section" => $this->request->getPost("section", FILTER_SANITIZE_STRING),
                "PROJMAN" => $this->request->getPost("projman", FILTER_SANITIZE_STRING),
                "SOFTENG2" => $this->request->getPost("softeng2", FILTER_SANITIZE_STRING),
                "ELECTIVE2" => $this->request->getPost("elective2", FILTER_SANITIZE_STRING),
                "NETCOM" => $this->request->getPost("netcom", FILTER_SANITIZE_STRING),
                "PROLANG" => $this->request->getPost("prolang", FILTER_SANITIZE_STRING),
            ];

            // save the student record to the database and check if it was successful
            if($this->studentRecordModel->save($dataForm) === true) {
                echo "Student record added successfully!";
            } else {
                echo "Failed to add student record.";
            }

            // redirect to the student record page
            return redirect()->to('StudentRecord');
                
        }
    }

    public function deleteStudentRecord($id)
    {
        // delete the student record with the given ID and check if it was successful
        if ($this->studentRecordModel->delete($id)) {
            echo "Student record deleted successfully!";
        } else {
            echo "Failed to delete student record.";
        }

        // redirect to the student record page
        return redirect()->to('StudentRecord');
    }

    public function editStudentRecord($id)
    {
        // check if the request method is POST
        if($this->request->getMethod() === 'POST')
        {

            // validate the form data
            if (!$this->validate($this->validationRules)) {
                // if validation fails, get the errors
                $errors = $this->validator->getErrors();
                $errorMessages = implode("<br>", $errors);

                // set flashdata with error messages
                session()->setFlashdata('error', $errorMessages);

                return redirect()->to('StudentRecord');
            }

            // sanitize and get the form data
            $dataForm = [
                "StudentID" => $this->request->getPost("studentID", FILTER_SANITIZE_STRING),
                "FirstName" => $this->request->getPost("firstName", FILTER_SANITIZE_STRING),
                "LastName" => $this->request->getPost("lastName", FILTER_SANITIZE_STRING),
                "Year" => $this->request->getPost("year", FILTER_SANITIZE_STRING),
                "Section" => $this->request->getPost("section", FILTER_SANITIZE_STRING),
                "PROJMAN" => $this->request->getPost("projman", FILTER_SANITIZE_STRING),
                "SOFTENG2" => $this->request->getPost("softeng2", FILTER_SANITIZE_STRING),
                "ELECTIVE2" => $this->request->getPost("elective2", FILTER_SANITIZE_STRING),
                "NETCOM" => $this->request->getPost("netcom", FILTER_SANITIZE_STRING),
                "PROLANG" => $this->request->getPost("prolang", FILTER_SANITIZE_STRING),
            ];

            // update the student record in the database and check if it was successful
            if($this->studentRecordModel->update($id, $dataForm) === true) {
                echo "Student record updated successfully!";
            } else {
                echo "Failed to update student record.";
            }

            // redirect to the student record page
            return redirect()->to('StudentRecord');
        }

        // if the request method is not POST, get the student record with the given ID
        $studentRecord = $this->studentRecordModel->find($id);

        // return the data
        return $studentRecord;
    }
}
