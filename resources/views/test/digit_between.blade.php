<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="{{url("/test_digits_between")}}" method="POST">
    
    @csrf

    <label for="fnumber">First Number:</label><br>
    <input type="text" id="fnumber" name="fnumber" value="123456"><br>
    <label for="snumber">First Number:</label><br>
    <input type="text" id="snumber" name="snumber" value="1"><br>
    <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/test_digits_between".</p>

</body>
</html>
