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

<?php 

  $nameError = $surnameError = $emailError = $phoneError = $ageError = "";
  $nameInput = $surnameInput = $emailInput = $phoneInput = $ageInput = $genderInput = $languageInput = $commentInput = "";
  $nameOutput = $surnameOutput = $emailOutput = $phoneOutput = $ageOutput = $genderOutput = $languageOutput = $commentOutput = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
      $nameError = "Name is required";
    } else {
      $nameInput = testInput($_POST['name']);
      if (!preg_match("/^[a-z-' ]*$/i", $nameInput)) {
        $nameError = "Only letters and white space are allowed";
      } else {
        $nameOutput = $nameInput;
      }
    }

    if (empty($_POST['surname'])) {
      $surnameError = "Surname is required";
    } else {
      $surnameInput = testInput($_POST['surname']);
      if (!preg_match("/^[a-z-' ]*$/i", $surnameInput)) {
        $surnameError = "Only letters and white space are allowed";
      } else {
        $surnameOutput = $surnameInput;
      }
    }

    if (empty($_POST['email'])) {
      $emailError = "Email is required";
    } else {
      $emailInput = testInput($_POST['email']);
      if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
      } else {
        $emailOutput = $emailInput;
      }
    }

    if (empty($_POST['phone'])) {
      $phoneError = "Phone is required";
    } else {
      $phoneInput = testInput($_POST['phone']);
      if (!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/", $phoneInput)) {
        $phoneError = "Invalid phone format";
      } else {
        $phoneOutput = $phoneInput;
      }
    }

    if (!empty($_POST['age'])) {
      $ageInput = $_POST['age'];

      if (!is_numeric($ageInput)) {
        $ageError = "Invalid type of data";
      } else {
        if ($ageInput >= 18 && $ageInput <= 30) {
          $ageOutput = $ageInput;
        } else {
          $ageError = "Invalid number";
        }
      }
    }
    
    if (!empty($_POST['comment'])) {
      $commentInput = testInput($_POST['comment']);
      $commentOutput = $commentInput;
    }

    if (!empty($_POST['gender'])) {
      $genderInput = testInput($_POST['gender']);
      $genderOutput = $genderInput;
    }

    if (!empty($_POST['first-language'])) {
      $languageInput = testInput($_POST['first-language']);
      $languageOutput = $languageInput;
    }

  }

  function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function validAge($data) {
    return (is_numeric($data) && $data >= 18 && $data <= 30  || empty($data));
  }

  function getParagraph($data, $content) {
    return "<p class='data-form'>".strtoupper($data).": ".$content."</p><br>";
  }

  $validForm = !empty($nameOutput) && !empty($surnameOutput) && !empty($emailOutput) && !empty($phoneOutput)  && validAge($ageInput);

  if ($validForm) {
    $nameInput = "";
    $ageInput = "";
    $surnameInput = "";
    $emailInput = "";
    $phoneInput = "";
    $genderInput = "";
    $languageInput = "";
    $commentInput = "";
  }

?>

    <h1>Data form</h1>
    <div id="main-container">
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
                    class="<?php echo (!empty($nameError)) ? "error-field":"";?>"
                    type="text" 
                    name="name" 
                    value="<?php echo $nameInput;?>" 
                    maxlength="30"
                  >
                  <p class="info <?php echo (empty($nameError) ? "" : "error");?>">
                    <?php 
                      echo (empty($nameError)) ? "(max. 30 characters)":$nameError;
                    ?>
                  </p>
              </div>
              <div class="field-form">
                  <label for="surname">
                    Surname:<span class="error">*</span>
                  </label>
                  <input 
                    id="surname" 
                    class="<?php echo (!empty($surnameError)) ? "error-field":"";?>"
                    type="text" 
                    name="surname" 
                    value="<?php echo $surnameInput;?>"
                    maxlength="30"
                  >
                  <p class="info <?php echo (empty($surnameError) ? "" : "error");?>">
                    <?php 
                      echo (empty($surnameError)) ? "(max. 30 characters)":$surnameError;
                    ?>
                  </p>
              </div>
              <div class="field-form">
                  <label for="email">
                    Email:<span class="error">*</span>
                  </label>
                  <input 
                    id="email" 
                    class="<?php echo (!empty($emailError)) ? "error-field":"";?>"
                    type="text" 
                    name="email" 
                    value="<?php echo $emailInput;?>"
                    maxlength="30"
                  >
                  <p class="info <?php echo (empty($emailError) ? "" : "error");?>">
                    <?php 
                      echo (empty($emailError)) ? "(max. 30 characters)":$emailError;
                    ?>
                  </p>
              </div>
              <div class="field-form">
                  <label for="phone">
                    Phone:<span class="error">*</span>
                  </label>
                  <input 
                    id="phone" 
                    class="<?php echo (!empty($phoneError)) ? "error-field":"";?>"
                    type="text" 
                    name="phone" 
                    value="<?php echo $phoneInput;?>"
                    maxlength="13"
                  >
                  <p class="info <?php echo (empty($phoneError) ? "" : "error");?>">
                    <?php 
                      echo (empty($phoneError)) ? "(max. 11 characters)":$phoneError;
                    ?>
                  </p>
              </div>
              <div class="field-form">
                  <label for="age">Age:</label>
                  <input 
                    id="age" 
                    class="<?php echo (!empty($ageError)) ? "error-field":"";?>"
                    type="text" 
                    name="age" 
                    value="<?php echo $ageInput;?>"
                    maxlength="2"
                  >
                  <p class="info <?php echo (empty($ageError) ? "" : "error");?>">
                    <?php 
                      echo (empty($ageError)) ? "(between 18 to 30)":$ageError;
                    ?>
                  </p>
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
                        <?php echo ($genderInput=="male") ? "checked":"";?>
                      >
                   male
                  </label>
                  <label for="female">
                      <input 
                        id="female" 
                        type="radio" 
                        name="gender" 
                        value="female"
                        <?php echo ($genderInput=="female") ? "checked":"";?>
                      >
                   female
                  </label>
                  <label for="other">
                      <input
                        id="other" 
                        type="radio" 
                        name="gender" 
                        value="other" 
                        <?php echo ($genderInput=="other" || empty($genderInput)) ? "checked":"";?>
                      >
                   other
                  </label>
              </div>
          </fieldset>
          <fieldset>
              <legend>Firs Language</legend>
              <div class="field-form">
                  <select name="first-language">
                      <option value="HTML" <?php echo ($languageInput=="HTML") ? "selected":"";?>>HTML</option>
                      <option value="PASCAL" <?php echo ($languageInput=="PASCAL") ? "selected":"";?>>PASCAL</option>
                      <option value="PYTHON" <?php echo ($languageInput=="PYTHON") ? "selected":"";?>>PYTHON</option>
                      <option value="JAVA" <?php echo ($languageInput=="JAVA") ? "selected":"";?>>JAVA</option>
                      <option value="C" <?php echo ($languageInput=="C") ? "selected":"";?>>C</option>
                  </select>
              </div>
          </fieldset>
          <fieldset>
              <legend>Comment</legend>
              <div class="field-form">
                  <textarea name="comment" maxlength="140"><?php echo $commentInput;?></textarea>
              </div>
          </fieldset>
          <div id="form-buttons">
              <input type="submit" value="Submit">
              <input type="reset" value="Reset">
          </div>
          <p style="padding: 5px 0px 5px 20px;" class="info">
            <span class="error">*</span> required field
          </p>
      </form>
      <div id="data">
        <h2>Valid output:</h2>
        <?php 
          if ($validForm) {
            echo getParagraph("name", $nameOutput);
            echo getParagraph("surname", $surnameOutput);
            echo getParagraph("email", $emailOutput);
            echo getParagraph("phone", $phoneOutput);
            echo getParagraph("age", $ageOutput);
            echo getParagraph("gender", $genderOutput);
            echo getParagraph("first language", $languageOutput);
            echo getParagraph("comment", $commentOutput);
          }
        ?>
      </div>
    </div>
</body>
</html>