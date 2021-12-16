<!-- Script untuk menampilkan form untuk insert student baru dan table list student -->

<div class="rounded bg-white p-4 shadow">
    <div class="d-flex justify-content-between align-item-center">
        <h3 class="font-weight-bold">Welcome, <span class="username"></span>!</h3>
        <button class="btn btn-primary" id="new-btn">ADD NEW STUDENT</button>
    </div>


    <hr>

    <form action="" id="student-form" class="border p-4 rounded mb-4">
        <div class="form-group row">
            <label class="col-md-3 col-form-label">First Name:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="Firstname" id="Firstname">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Middle Name:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="Middlename" id="Middlename">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Last Name:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="Lastname" id="Lastname">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Gender:</label>
            <div class="col-md-9">
                <select name="Gender" id="Gender" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Date of Birth:</label>
            <div class="col-md-9">
                <input type="date" class="form-control" name="DBirth" id="DBirth">
            </div>
        </div>

        <div class="text-right">
            <button type="reset" name="cancel-btn" id="cancel-btn" class="btn mr-3">CLEAR</button>
            <button type="submit" name="save-btn" id="save-btn" class="btn btn-primary">SAVE</button>
        </div>
    </form>

    <table id="student" class="display" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
            </tr>
        </thead>
    </table>
</div>