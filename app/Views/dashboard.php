<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT RECORDS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/styles/dashboard.css') ?>">
    <link href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap-icons/font/bootstrap-icons.css') ?>">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-1">
            <h1 class="header-title">STUDENT RECORDS</h1>
            <button id="openAddModalBtn" class="btn-add-student" data-icon="bi bi-person-plus-fill"
                data-header="Add Student">
                <i class="bi bi-person-plus-fill"></i> Add Student
            </button>
        </div>

        <div class="table-container">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th>ProjMan</th>
                        <th>SoftEng2</th>
                        <th>Elective2</th>
                        <th>NetCom</th>
                        <th>ProLang</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>

                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>k1204487</td>
                        <td>aaron villamento</td>
                        <td>3rd</td>
                        <td>BCSAD</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>1.65</td>
                        <td>
                            <button class="action-btn me-1" id="openEditModalBtn" data-icon="bi bi-pencil-fill"
                                data-header="Edit Student">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="action-btn btn-delete"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <button class="logout-btn">
                <i class="bi bi-box-arrow-left logout-icon"></i> LOGOUT
            </button>
        </div>
    </div>

    <div id="addStudentModal" class="modal-overlay">
        <div class="modal-content-container">
            <div class="modal-header">
                <i id="modalIcon" class="bi bi-person-plus-fill"></i>
                <h2 id="modalHeader">ADD STUDENT</h2>
            </div>
            <div class="modal-body">
                <h4 class="info-header">Student Information</h4>
                <div class="divider"></div>
                <div class="form-group" style="flex: 1;">
                    <label for="studentid" class="name-input">Student ID</label>
                    <input type="text" id="studentID" name="studentID">
                </div>
                <div class="input-group">
                    <div class="form-group" style="flex: 1;">
                        <label for="firstName" class="name-input">First Name</label>
                        <input type="text" id="firstName" name="firstName">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="lastName" class="name-input">Last Name</label>
                        <input type="text" id="lastName" name="lastName">
                    </div>
                </div>
                <div class="input-group">
                    <div class="form-group" style="flex: 1;">
                        <label for="year">Year</label>
                        <select id="year" name="year">
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="section">Section</label>
                        <select id="section" name="section">
                            <option value="1st">ACSAD</option>
                            <option value="2nd">BCSAD</option>
                            <option value="3rd">CCSAD</option>
                            <option value="4th">DCSAD</option>
                        </select>
                    </div>
                </div>
                <h4 class="info-header">Student Grades</h4>
                <div class="divider"></div>

                <div class="input-group">
                    <div class="form-group" style="flex: 1;">
                        <label for="projman">PROJMAN</label>
                        <input type="number" id="projman" name="projman">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="softeng2">SOFTENG</label>
                        <input type="number" id="softeng2" name="softeng2">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="elective2">ELECTIVE2</label>
                        <input type="number" id="elective2" name="elective2">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="netcom">NETCOM</label>
                        <input type="number" id="netcom" name="netcom">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="prolang">PROLANG</label>
                        <input type="number" id="prolang" name="prolang">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="save">SAVE</button>
                <button type="button" class="cancel" id="cancelAddEditBtn">CANCEL</button>
            </div>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal">
        <div class="modal-content-container-delete">
            <div class="modal-header">
                <i class="bi bi-exclamation-triangle-fill" style="color:#e74a3b; font-size:3.4rem;"></i>
                <h2>Confirm Delete</h2>
            </div>
            <div class="modal-body-delete">
                <p>Are you sure you want to delete this student?</p>
            </div>
            <div class="modal-footer">
                <button id="confirmDeleteBtn" class="btn-save">Delete</button>
                <button type="button" class="btn-cancel" id="cancelDeleteBtn">Cancel</button>
            </div>
        </div>
    </div>

</html>

<script src="<?= base_url('public/scripts/dashboard-quiz.js') ?>"></script>