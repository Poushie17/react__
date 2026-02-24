<!DOCTYPE html>
<html>
<head>
    <title>Employee Profile Form</title>
    <script>
        function validateForm() {
            let form = document.forms["employee"];
            
            let name = form["name"].value.trim();
            let age = form["age"].value.trim();
            let email = form["email"].value.trim();
            let phone = form["phone"].value.trim();
            let gender = document.querySelector('input[name="gender"]:checked');
            let department = form["department"].value;
            let skills = document.querySelectorAll('input[name="skills[]"]:checked');
            let address = form["address"].value.trim();

            // Name validation
            if (name === "") {
                alert("Please enter name");
                return false;
            }

            // Age validation
            if (age === "" || isNaN(age) || age <= 0) {
                alert("Please enter a valid age");
                return false;
            }

            // Email validation
            if (email === "" || !email.includes("@")) {
                alert("Please enter a valid email");
                return false;
            }

            // Phone validation
            if (phone === "" || isNaN(phone)) {
                alert("Please enter a valid phone number");
                return false;
            }

            // Gender validation
            if (!gender) {
                alert("Please select gender");
                return false;
            }

            // Department validation
            if (department === "") {
                alert("Please select department");
                return false;
            }

            // Skills validation
            if (skills.length === 0) {
                alert("Please select at least one skill");
                return false;
            }

            // Address validation
            if (address === "") {
                alert("Please enter address");
                return false;
            }

            return true; // All validation passed
        }
    </script>
</head>
<body>

<h1>Employee Profile Form</h1>
<form name="employee" action="problem9.php" method="post" onsubmit="return validateForm()">

    <label>Full Name:</label>
    <input type="text" name="name"><br><br>

    <label>Age:</label>
    <input type="number" name="age"><br><br>

    <label>Email:</label>
    <input type="email" name="email"><br><br>

    <label>Phone:</label>
    <input type="text" name="phone"><br><br>

    <label>Gender:</label>
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female<br><br>

    <label>Department:</label>
    <select name="department">
        <option value="">Select Department</option>
        <option value="HR">HR</option>
        <option value="Finance">Finance</option>
        <option value="CSE">CSE</option>
        <option value="Marketing">Marketing</option>
    </select><br><br>

    <label>Skills:</label>
    <input type="checkbox" name="skills[]" value="Communication"> Communication
    <input type="checkbox" name="skills[]" value="Coding"> Coding
    <input type="checkbox" name="skills[]" value="Management"> Management<br><br>

    <label>Address:</label>
    <textarea name="address" rows="3"></textarea><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>