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

    <!-- Error Messages -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="error-message">
            <b>ERROR! </b><br>
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- Main Container -->
    <div class="container-fluid">
        <!-- Top Container -->
        <div class="d-flex justify-content-between align-items-center mb-1">
            <!-- Header Title -->
            <h1 class="header-title">STUDENT RECORDS</h1> 

            <!-- Add Student Button -->
            <button id="openAddModalBtn" class="btn-add-student" data-icon="bi bi-person-plus-fill"
                data-header="Add Student">
                <i class="bi bi-person-plus-fill"></i> Add Student
            </button>
        </div>

        <!-- Table Container -->
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
                    <!-- Loop through each student record and display in table -->
                    <?php foreach ($studentRecord as $student) : ?>
                        <tr>
                            <!-- Student Information -->
                            <td><?= $student['StudentID'] ?></td>
                            <td><?= $student['Firstname'] . ' ' . $student['Lastname'] ?></td>
                            <td><?= (new \App\Libraries\YearGetter())->getFullYear($student['Year']) ?></td>
                            <td><?= (new \App\Libraries\SectionGetter())->getFullSection($student['Section']) ?></td>
                            
                            <!-- Student Grades -->
                            <td><?= $student['PROJMAN'] ?></td>
                            <td><?= $student['SOFTENG2'] ?></td>
                            <td><?= $student['ELECTIVE2'] ?></td>
                            <td><?= $student['NETCOM'] ?></td>
                            <td><?= $student['PROLANG'] ?></td>

                            <!-- Action Buttons -->
                            <td>
                                <button class="action-btn btn-edit" data-id="<?= $student['ID'] ?>" data-icon="bi bi-pencil-fill"
                                    data-header="Edit Student">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button class="action-btn btn-delete" id="<?= $student['ID'] ?>"><i class="bi bi-trash-fill"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Footer Container -->
        <div class="mt-5">
            <!-- Logout Button -->
            <a href="<?= base_url('login/logout') ?>">
                <button class="logout-btn">
                    <i class="bi bi-box-arrow-left logout-icon"></i> LOGOUT
                </button>
            </a>
        </div>
    </div>


    <!-- Add Student Modal -->
    <div id="addStudentModal" class="modal-overlay">
        <!-- Main modal container -->
        <div class="modal-content-container">
            <!-- Modal header (icon + header) -->
            <div class="modal-header">
                <i id="modalIcon" class="bi bi-person-plus-fill"></i>
                <h2 id="modalHeader">ADD STUDENT</h2>
            </div>

            <!-- Modal body (form) -->
            <?= form_open('StudentRecord/addStudentRecord'); ?>
                <div class="modal-body">
                    <!-- Student Information Section -->
                    <h4 class="info-header">Student Information</h4>
                    <div class="divider"></div>

                    <!-- Student ID Form Fields -->
                    <div class="form-group" style="flex: 1;">
                        <?= form_label('Student ID', 'studentID', ['class' => 'name-input']); ?>
                        <?= form_input(['type' => 'text', 'id' => 'studentID', 'name' => 'studentID']); ?>
                    </div>

                    <!-- Student Name Form Fields -->
                    <div class="input-group">
                        <div class="form-group" style="flex: 1;">
                            <?= form_label('First Name', 'firstName', ['class' => 'name-input']); ?>
                            <?= form_input(['type' => 'text', 'id' => 'firstName', 'name' => 'firstName']); ?>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <?= form_label('Last Name', 'lastName', ['class' => 'name-input']); ?>
                            <?= form_input(['type' => 'text', 'id' => 'lastName', 'name' => 'lastName']); ?>
                        </div>
                    </div>

                    <!-- Student Year and Section Form Fields -->
                    <div class="input-group">
                        <!-- Year -->
                        <div class="form-group" style="flex: 1;">
                            <?= form_label('Year', 'year', ['class' => 'name-input']); ?>
                            <?= form_dropdown('year', [
                                '1' => '1st',
                                '2' => '2nd',
                                '3' => '3rd',
                                '4' => '4th'
                            ], '1', ['id' => 'year']); ?>
                        </div>

                        <!-- Section -->
                        <div class="form-group" style="flex: 1;">
                            <?= form_label('Section', 'section', ['class' => 'name-input']); ?>
                            <?= form_dropdown('section', [
                                'A' => 'ACSAD',
                                'B' => 'BCSAD',
                                'C' => 'CCSAD',
                                'D' => 'DCSAD'
                            ], 'A', ['id' => 'section']); ?>
                        </div>
                    </div>

                    <!-- Student Grades Section -->
                    <h4 class="info-header">Student Grades</h4>
                    <div class="divider"></div>

                    <!-- Student Grades Form Fields -->
                    <div class="input-group">
                        <!-- PROJMAN Fields -->
                        <div class="form-group" style="flex: 1;">
                            <?= form_label('PROJMAN', 'projman', ['class' => 'name-input']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0.01', 'id' => 'projman', 'name' => 'projman']); ?>
                        </div>

                        <!-- SOFTENG2 Fields -->
                        <div class="form-group" style="flex: 1;">
                            <?= form_label('SOFTENG2', 'softeng2', ['class' => 'name-input']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0.01', 'id' => 'softeng2', 'name' => 'softeng2']); ?>
                        </div>

                        <!-- ELECTIVE2 Fields -->
                        <div class="form-group" style="flex: 1;">
                            <?= form_label('ELECTIVE2', 'elective2', ['class' => 'name-input']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0.01', 'id' => 'elective2', 'name' => 'elective2']); ?>
                        </div>

                        <!-- NETCOM Fields -->
                        <div class="form-group" style="flex: 1;">
                            <?= form_label('NETCOM', 'netcom', ['class' => 'name-input']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0.01', 'id' => 'netcom', 'name' => 'netcom']); ?>
                        </div>

                        <!-- PROLANG Fields -->
                        <div class="form-group" style="flex: 1;">
                            <?= form_label('PROLANG', 'prolang', ['class' => 'name-input']); ?>
                            <?= form_input(['type' => 'number', 'step' => '0.01', 'id' => 'prolang', 'name' => 'prolang']); ?>
                        </div>
                    </div>
                </div>

                <!-- Modal footer (buttons) -->
                <div class="modal-footer">
                    <!-- submit button (saves the student record when clicked) -->
                    <?= form_button([
                        'type' => 'submit',
                        'class' => 'save',
                        'content' => 'SAVE'
                    ]); ?>

                    <!-- cancel button (closes the modal when clicked) -->
                    <?= form_button([
                        'type' => 'button',
                        'class' => 'cancel',
                        'content' => 'CANCEL',
                        'id' => 'cancelAddEditBtn'
                    ]); ?>
                </div>
            <?= form_close(); ?>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal">
        <!-- Main modal container -->
        <div class="modal-content-container-delete">
            <!-- Modal header (icon + header) -->
            <div class="modal-header">
                <i class="bi bi-exclamation-triangle-fill" style="color:#e74a3b; font-size:3.4rem;"></i> <!-- Icon -->
                <h2>Confirm Delete</h2> <!-- Modal header -->
            </div>

            <!-- Modal body (message) -->
            <div class="modal-body-delete">
                <p>Are you sure you want to delete this student?</p>
            </div>

            <!-- Modal footer (buttons) -->
            <div class="modal-footer">
                <!-- delete button (triggers deletion when clicked) -->
                <button id="confirmDeleteBtn" class="btn-save">Delete</button>
                
                <!-- cancel button (closes the modal when clicked) -->
                <button type="button" class="btn-cancel" id="cancelDeleteBtn">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Script for Add Student Modal -->
    <script>
        // Show Add Student Modal
        document.getElementById('openAddModalBtn').addEventListener('click', () => {
            document.getElementById('addStudentModal').style.display = 'flex';
        });

        // Hide Add Student Modal on Cancel
        document.getElementById('cancelAddEditBtn').addEventListener('click', () => {
            document.getElementById('addStudentModal').style.display = 'none';
        });
    </script>

    <!-- Script for Delete Confirmation Modal -->
    <script>
        // initialize a variable to store the selected student ID
        let selectedStudentId = null;

        // Attach click event listeners to all delete buttons
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', (e) => {
                // Get the ID of the student to be deleted
                selectedStudentId = e.currentTarget.id;
                // Show the delete confirmation modal
                document.getElementById('deleteModal').style.display = 'flex';
            });
        });

        // Confirm Delete
        document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
            // Check if a student ID is selected
            if (selectedStudentId) {
                // Redirect to the delete student record method in the controller
                window.location.href = `<?= base_url('StudentRecord/deleteStudentRecord/') ?>${selectedStudentId}`;
            }

            // Hide the delete confirmation modal
            document.getElementById('deleteModal').style.display = 'none';
        });

        // Cancel Delete
        document.getElementById('cancelDeleteBtn').addEventListener('click', () => {
            document.getElementById('deleteModal').style.display = 'none';
        });

    </script>

    <!-- Script for Edit Student Modal -->
    <script>
        // initialize variables for edit mode and current editing ID
        let isEditMode = false;
        let currentEditingId  = null;

        // Attach click event listeners to all edit buttons
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', async(e) => {
                // Get the ID of the student to be edited
                currentEditingId = e.currentTarget.getAttribute('data-id');
                
                // enable edit mode
                isEditMode = true;

                // update modal header and icon
                document.getElementById('modalHeader').innerText = 'EDIT STUDENT';
                document.getElementById('modalIcon').className = 'bi bi-pencil-fill';

                // update the form action to point to the edit student record method in the controller
                document.querySelector('#addStudentModal form').action = '<?= base_url('StudentRecord/editStudentRecord/') ?>' + currentEditingId;

                // get the student data from the database
                <?php foreach ($studentRecord as $student) : ?>
                    // check if the current student ID matches the one being edited
                    if (currentEditingId == <?= $student['ID'] ?>) {
                        // Fill information fields with the student data
                        document.getElementById('studentID').value = '<?= $student['StudentID'] ?>';
                        document.getElementById('firstName').value = '<?= $student['Firstname'] ?>';
                        document.getElementById('lastName').value = '<?= $student['Lastname'] ?>';
                        document.getElementById('year').value = '<?= $student['Year'] ?>';
                        document.getElementById('section').value = '<?= $student['Section'] ?>';
                        
                        // Fill grades fields with the student data
                        document.getElementById('projman').value = '<?= $student['PROJMAN'] ?>';
                        document.getElementById('softeng2').value = '<?= $student['SOFTENG2'] ?>';
                        document.getElementById('elective2').value = '<?= $student['ELECTIVE2'] ?>';
                        document.getElementById('netcom').value = '<?= $student['NETCOM'] ?>';
                        document.getElementById('prolang').value = '<?= $student['PROLANG'] ?>';
                    }
                <?php endforeach; ?>
                
                // Show the add/edit student modal
                document.getElementById('addStudentModal').style.display = 'flex';
            });
        });
    </script>

</html>