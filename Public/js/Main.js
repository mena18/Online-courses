var n=1;



function add_with_radio_buttons(){
    var form = $("#quiz_form");
    var Great_div = $("<div class='form-group'></div>");
    var p = $("<p contenteditable='true'>Q)Click to change text</p>");

    Great_div.append(p);
    id = "id_"+n;
    button = $("<button id="+id+" class='btn btn-primary mb-3' onclick='add_one_raido_button()'>Add new Option</button>");
    Great_div.append(button);


    form.append(Great_div);
    n++;

}


function add_with_check_buttons(){
    var form = $("#quiz_form");
    var Great_div = $("<div class='form-group'></div>");
    var p = $("<p contenteditable='true'>Q)Click to change text</p>");

    Great_div.append(p);
    id = "id_"+n;
    button = $("<button id="+id+" class='btn btn-primary mb-3' onclick='add_one_check_box(n)'>Add new Option</button>");
    Great_div.append(button);


    form.append(Great_div);
    n++;
}

function add_one_check_box(){
event.preventDefault();
  e = window.event.target;
  input = $("<input class='form-check-input' type='checkbox' name='question_"+e.id+"[]' >");
  label  = $("<label contenteditable='true' class='form-check-label'> Default radio </label>");
  div = $("<div class='form-check'></div>");
  div.append(input);
  div.append(label);


	divs = e.parentElement
  divs.append(div[0]);
}

function add_one_raido_button(){
  event.preventDefault();
  e = window.event.target;
  input = $("<input class='form-check-input' type='radio' name='question_"+e.id+"' >");
  label  = $("<label contenteditable='true' class='form-check-label'> Default radio </label>");
  div = $("<div class='form-check' ></div>");
  div.append(input);
  div.append(label);


  divs = e.parentElement
  divs.append(div[0]);

}


function save(){
    form = $("#quiz_form")[0];
    groups = form.getElementsByClassName('form-group');
    Questions = []
    for(var i=0;i<groups.length;i++){

        var cur_group = groups[i];
        var Question = {
            'p':cur_group.getElementsByTagName('p')[0].innerText,
            'options':[],
            'ans':[],
            'type':'radio',
        }


        controls = cur_group.getElementsByClassName('form-check');
        Question['type'] = controls[0].getElementsByTagName('input')[0].type;


        for(j=0;j<controls.length;j++){
            cur_control = controls[j];
            label = cur_control.getElementsByTagName('label')[0].innerText;
            input = cur_control.getElementsByTagName('input')[0];
            Question['options'].push(label);
            if(input.checked){
                Question['ans'].push(label);
            }
        }
        Questions.push(Question);
    }

    hidden = $("#hidden")[0];
    console.log(hidden);
    hidden.value = JSON.stringify(Questions);
    console.log(JSON.stringify(Questions));

    form.submit();
}
