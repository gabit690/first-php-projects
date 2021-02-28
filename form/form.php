<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1</title>
    <link rel="stylesheet" href="./formStyle.css">
</head>
<body>
    <h1>Data form</h1>
    <form 
      action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" 
      method="POST"
    >
        <fieldset>
            <legend>Personal Data</legend>
            <div class="field-form">
                <label for="name">
                  Name:<span class="error">*</span>
                </label>
                <input 
                  id="name" 
                  type="text" 
                  name="name" 
                  value="" 
                  maxlength="30"
                >
            </div>
            <div class="field-form">
                <label for="surname">
                  Surname:<span class="error">*</span>
                </label>
                <input 
                  id="surname" 
                  type="text" 
                  name="surname" 
                  value=""
                  maxlength="30"
                >
            </div>
            <div class="field-form">
                <label for="email">
                  Email:<span class="error">*</span>
                </label>
                <input 
                  id="email" 
                  type="text" 
                  name="email" 
                  value=""
                  maxlength="30"
                >
            </div>
            <div class="field-form">
                <label for="phone">
                  Phone:<span class="error">*</span>
                </label>
                <input 
                  id="phone" 
                  type="text" 
                  name="phone" 
                  value=""
                  maxlength="11"
                >
            </div>
            <div class="field-form">
                <label for="age">Age:</label>
                <input 
                  id="age" 
                  type="text" 
                  name="age" 
                  value=""
                  maxlength="3"
                >
            </div>
        </fieldset>
        <fieldset>
            <legend>Gender</legend>
            <div class="field-form">
                <label for="male">
                    <input 
                      id="male" 
                      type="radio" 
                      name="gender" 
                      value="male"
                    >
                 male
                </label>
                <label for="female">
                    <input 
                      id="female" 
                      type="radio" 
                      name="gender" 
                      value="female"
                    >
                 female
                </label>
                <label for="other">
                    <input
                      id="other" 
                      type="radio" 
                      name="gender" 
                      value="other" 
                      checked
                    >
                 other
                </label>
            </div>
        </fieldset>
        <fieldset>
            <legend>Firs Language</legend>
            <div class="field-form">
                <select name="first-language">
                    <option value="html">HTML</option>
                    <option value="pascal">PASCAL</option>
                    <option value="python">PYTHON</option>
                    <option value="java">JAVA</option>
                    <option value="c">C</option>
                </select>
            </div>
        </fieldset>
        <fieldset>
            <legend>Comment</legend>
            <div class="field-form">
                <textarea name="comment" maxlength="140"></textarea>
            </div>
        </fieldset>
        <div id="form-buttons">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>
        <p style="padding: 5px 0px 5px 20px;">* required field</p>
    </form>
    <h2>Your output:</h2>
</body>
</html>

<?php 
  echo "<h3>Agregado</h3>"
?>