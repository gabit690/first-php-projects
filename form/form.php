<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1</title>
</head>
<body>
    <h1>Data form</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label>
        Name: <input type="text" name="name" value="">
    </label>
    <label>
        Surname: <input type="text" name="surname" value="">
    </label>
    <label>
        Email: <input type="text" name="email" value="">
    </label>
    <label>
        Age: <input type="text" name="age" value="">
    </label>
    <label>
        Gender: 
        <input type="radio" name="gender" value="male">
        <input type="radio" name="gender" value="female">
        <input type="radio" name="gender" value="other">
    </label>
    <label>
        First language:
        <select name="first-language">
            <option value="html">HTML</option>
            <option value="pascal">PASCAL</option>
            <option value="python">PYTHON</option>
            <option value="java">JAVA</option>
            <option value="c">C</option>
        </select>
    </label>
    <label>
        Comment:
        <textarea name="comment" cols="30" rows="10"></textarea>
    </label>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
    </form>
    <h2>Your output:</h2>
</body>
</html>