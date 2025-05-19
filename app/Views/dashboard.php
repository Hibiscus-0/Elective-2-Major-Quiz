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
    <?php if (session()->getFlashdata('error')): ?>
        <div class="error-message">
            <b>ERROR! </b><br>
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
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
                    <?php foreach ($studentRecord as $student) : ?>
                        <tr>
                            <td><?= $student['StudentID'] ?></td>
                            <td><?= $student['Firstname'] . ' ' . $student['Lastname'] ?></td>
                            <td><?= (new \App\Libraries\YearGetter())->getFullYear($student['Year']) ?></td>
                            <td><?= (new \App\Libraries\SectionGetter())->getFullSection($student['Section']) ?></td>
                            <td><?= $student['PROJMAN'] ?></td>
                            <td><?= $student['SOFTENG2'] ?></td>
                            <td><?= $student['ELECTIVE2'] ?></td>
                            <td><?= $student['NETCOM'] ?></td>
                            <td><?= $student['PROLANG'] ?></td>
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

        <div class="mt-5">
            <a href="<?= base_url('login/logout') ?>">
            <button class="logout-btn">
                <i class="bi bi-box-arrow-left logout-icon"></i> LOGOUT
            </button>
            </a>
        </div>
    </div>


    <!-- Add Student Modal -->
    <div id="addStudentModal" class="modal-overlay">
        <div class="modal-content-container">
            <div class="modal-header">
                <i id="modalIcon" class="bi bi-person-plus-fill"></i>
                <h2 id="modalHeader">ADD STUDENT</h2>
            </div>
        <?= form_open('StudentRecord/addStudentRecord'); ?>
            <div class="modal-body">
                <h4 class="info-header">Student Information</h4>
                <div class="divider"></div>
                <div class="form-group" style="flex: 1;">
                    <?= form_label('Student ID', 'studentID', ['class' => 'name-input']); ?>
                    <?= form_input(['type' => 'text', 'id' => 'studentID', 'name' => 'studentID']); ?>
                </div>
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
                <div class="input-group">
                    <div class="form-group" style="flex: 1;">
                        <?= form_label('Year', 'year', ['class' => 'name-input']); ?>
                        <?= form_dropdown('year', [
                            '1' => '1st',
                            '2' => '2nd',
                            '3' => '3rd',
                            '4' => '4th'
                        ], '1', ['id' => 'year']); ?>
                    </div>
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
                <h4 class="info-header">Student Grades</h4>
                <div class="divider"></div>

                <div class="input-group">
                    <div class="form-group" style="flex: 1;">
                        <?= form_label('PROJMAN', 'projman', ['class' => 'name-input']); ?>
                        <?= form_input(['type' => 'number', 'step' => '0.01', 'id' => 'projman', 'name' => 'projman']); ?>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <?= form_label('SOFTENG2', 'softeng2', ['class' => 'name-input']); ?>
                        <?= form_input(['type' => 'number', 'step' => '0.01', 'id' => 'softeng2', 'name' => 'softeng2']); ?>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <?= form_label('ELECTIVE2', 'elective2', ['class' => 'name-input']); ?>
                        <?= form_input(['type' => 'number', 'step' => '0.01', 'id' => 'elective2', 'name' => 'elective2']); ?>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <?= form_label('NETCOM', 'netcom', ['class' => 'name-input']); ?>
                        <?= form_input(['type' => 'number', 'step' => '0.01', 'id' => 'netcom', 'name' => 'netcom']); ?>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <?= form_label('PROLANG', 'prolang', ['class' => 'name-input']); ?>
                        <?= form_input(['type' => 'number', 'step' => '0.01', 'id' => 'prolang', 'name' => 'prolang']); ?>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <?= form_button([
                    'type' => 'submit',
                    'class' => 'save',
                    'content' => 'SAVE'
                ]); ?>
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

    <script>
        // Show Add Student Modal
        document.getElementById('openAddModalBtn').addEventListener('click', () => {
            document.getElementById('addStudentModal').style.display = 'flex';
        });

        // Hide Add Student Modal on Cancel
        document.getElementById('cancelAddEditBtn').addEventListener('click', () => {
            document.getElementById('addStudentModal').style.display = 'none';
        });

        // Optional: Close modal when clicking outside
        window.addEventListener('click', (e) => {
            const modal = document.getElementById('addStudentModal');
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>

    <script>
        let selectedStudentId = null;
        // Delete Modal Logic
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', (e) => {
                selectedStudentId = e.currentTarget.id;
                document.getElementById('deleteModal').style.display = 'flex';
            });
        });

        // Confirm Delete
        document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
            if (selectedStudentId) {
                window.location.href = `<?= base_url('StudentRecord/deleteStudentRecord/') ?>${selectedStudentId}`;
            }
            document.getElementById('deleteModal').style.display = 'none';
        });

        // Cancel Delete
        document.getElementById('cancelDeleteBtn').addEventListener('click', () => {
            document.getElementById('deleteModal').style.display = 'none';
        });

        // Close delete modal when clicking outside
        window.addEventListener('click', (e) => {
            const deleteModal = document.getElementById('deleteModal');
            if (e.target === deleteModal) {
                deleteModal.style.display = 'none';
            }
        });
    </script>

    <script>
        let isEditMode = false;
        let currentEditingId  = null;
        // Edit Modal Logic
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', async(e) => {
                currentEditingId = e.currentTarget.getAttribute('data-id');
                isEditMode = true;

                document.getElementById('modalHeader').innerText = 'EDIT STUDENT';
                document.getElementById('modalIcon').className = 'bi bi-pencil-fill';

                document.querySelector('#addStudentModal form').action = '<?= base_url('StudentRecord/editStudentRecord/') ?>' + currentEditingId;

                <?php foreach ($studentRecord as $student) : ?>
                    if (currentEditingId == <?= $student['ID'] ?>) {
                        document.getElementById('studentID').value = '<?= $student['StudentID'] ?>';
                        document.getElementById('firstName').value = '<?= $student['Firstname'] ?>';
                        document.getElementById('lastName').value = '<?= $student['Lastname'] ?>';
                        document.getElementById('year').value = '<?= $student['Year'] ?>';
                        document.getElementById('section').value = '<?= $student['Section'] ?>';
                        document.getElementById('projman').value = '<?= $student['PROJMAN'] ?>';
                        document.getElementById('softeng2').value = '<?= $student['SOFTENG2'] ?>';
                        document.getElementById('elective2').value = '<?= $student['ELECTIVE2'] ?>';
                        document.getElementById('netcom').value = '<?= $student['NETCOM'] ?>';
                        document.getElementById('prolang').value = '<?= $student['PROLANG'] ?>';
                    }
                <?php endforeach; ?>

                document.getElementById('addStudentModal').style.display = 'flex';
            });
        });
    </script>

</html>