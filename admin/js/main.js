function show(){
    var photo = document.forms['myForm']['photo'];
    if(photo.value !== "")
    {
        var image = document.getElementById('image');
        if(photo.files[0].size > 5000000)
        {
            alert("File size must be 5 Mb or less");
            photo.value = "";
            image.src = "img/default-user.jpg";
        }
        else if(photo.files[0].name.split('.').pop() == "png" || photo.files[0].name.split('.').pop() == "jpg" || 
                photo.files[0].name.split('.').pop() == "jpeg")
        {
            image.src = window.URL.createObjectURL(photo.files[0]);
        }
        else
        {
            alert("Only jpg, jpeg and png files allowed");
            photo.value = "";
            image.src = "img/default-user.jpg";
        }
    }
}
function clearPhoto()
{
    var image = document.getElementById('image');
    image.src = "img/default-user.jpg";
}

function getStudents(classid)
{
    var params = "cid="+classid.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get-students.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.status == 200)
        {
            var students = JSON.parse(this.responseText);
            var output = '';

            if(students == "No students")
                output = '<option value="">No students</option>';
            else
                for(var i in students)
                {
                    output += '<option value="'+students[i].id+'">'+students[i].Name+'</option>';
                }         
            document.getElementById('sname').innerHTML = output;
        }           
    }
    xhr.send(params);
}


function getSubjects(classid)
{
    var params = "cid="+classid.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get-subjects.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.status == 200)
        {
            var subjects = JSON.parse(this.responseText);
            var output = '';

            if(subjects == "No subjects")
                output = '<div class="h3 text-center text-danger">No subject for this class is added yet</div>';
            else
            {
                output = '<div class="col-md-6 text-center my-3 py-2 bg-danger rounded-left border-right"><span class="font-weight-bold">Half Yearly exam marks MM (100)</span></div><div class="col-md-6 text-center my-3 py-2 bg-danger rounded-right border-left"><span class="font-weight-bold">Yearly exam marks  MM (100)</span></div>';
                
                for(var i in subjects)
                {
                    var j = parseInt(i)+1;
                    
                    output += '<div class="col-md-6 mb-3"><label>'+subjects[i].SubjectName+' ( '+ subjects[i].SubjectCode +')</label><input type="Number" min=0 max=100 class="form-control" name="'+ subjects[i].id +'_HYE" placeholder="Half Yearly Marks" required></div><div class="col-md-6 mb-3"><label>'+subjects[i].SubjectName+' ( '+ subjects[i].SubjectCode +')</label><input type="Number" min=0 max=100 class="form-control" name="'+ subjects[i].id +'_YE" placeholder="Yearly Marks" required><input type="hidden" value="'+ subjects[i].id +'" name="sub'+ j +'"/></div>';
                }
            }
            document.getElementById('subjects').innerHTML = output;
        }           
    }
    xhr.send(params);
}

function attendanceGetStudents(classid)
{
    var params = "cid="+classid.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get-students.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.status == 200)
        {
            var students = JSON.parse(this.responseText);
            var output = '<tr><th>Attendance</th><th>Roll Number</th><th>Student Name</th></tr>';

            if(students == "No students")
                output += '<tr><td colspan="3"><strong class="text-danger">No students</strong></td></tr>';
            else
                for(var i in students)
                {
                    //For check box input
                    // output += '<tr><td><input type="checkbox" name="present[]" value="' + students[i].id + '" class="form-check-input" checked></td><td>' + students[i].RollNumber + '</td><td>' + students[i].Name + '</td></tr>';

                    output += '<tr><td><div class="form-check form-check-inline"><input type="radio" name="attendance[' + students[i].id + ']" value="0" class="form-check-input"><label class="text-danger mr-2 form-check-label">Absent</label><input type="radio" name="attendance[' + students[i].id + ']" value="1" class="form-check-input" checked><label class="form-check-label text-success">Present</label></div></td><td>' + students[i].RollNumber + '</td><td>' + students[i].Name + '</td></tr>';
                }         
            document.getElementById('table').innerHTML = output;
        }           
    }
    xhr.send(params);
}


function attendanceGetSubjects(classid)
{
    var params = "cid="+classid.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get-subjects.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.status == 200)
        {
            var subjects = JSON.parse(this.responseText);
            var output = '';

            if(subjects == "No subjects")
                output = '<option value="">No Subjects</option>';
            else
                for(var i in subjects)
                    {
                        output += '<option value="' + subjects[i].id + '">' + subjects[i].SubjectName + '(' + subjects[i].SubjectCode + ')' + '</option>';
                    }
            document.getElementById('subjects').innerHTML = output;
        }           
    }
    xhr.send(params);
}

function timeTableGetSubjects(classid)
{
    var params = "cid="+classid.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get-subjects.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.status == 200)
        {
            var subjects = JSON.parse(this.responseText);
            var output = '';

            if(subjects == "No subjects")
                output = '<div class="h3 text-center text-danger">No subject for this class is added yet</div>';
            else
            {
                output = "";
                
                for(var i in subjects)
                {
                    var j = parseInt(i)+1;
                    
                    output += '<div class="col-md-9 p-3 mx-auto "><label>'+subjects[i].SubjectName+' ( '+ subjects[i].SubjectCode +')</label><input type="date" class="form-control" name="'+ subjects[i].id +'" required><input type="hidden" name="sub[]" value="'+subjects[i].id+'"></div>';
                }
            }
            document.getElementById('timetable-subjects').innerHTML = output;
        }           
    }
    xhr.send(params);
}