var n=1;


function add(){

    var question_n = prompt("Enter number of question");
    var type = prompt("Enter 1 for radio 2 for check");

    if(type==1){
        add_with_radio_buttons(question_n);
    }else{
        add_with_check_buttons(question_n);
    }

    n++;
}

function add_with_radio_buttons(question_n){
    var form = $("form");
    var Great_div = $("<div class='form-group'></div>");
    var p = $("<p contenteditable='true'>Q)Click to change text</p>");
    var divs = [];

    for(var i =0 ;i<question_n;i++){
        input = $("<input class='form-check-input' value=val_"+(i+1)+" type='radio' name='question_"+n+"' >");
        label  = $("<label contenteditable='true' class='form-check-label'> Default radio </label>");
        div = $("<div class='form-check' ></div>");
        div.append(input);
        div.append(label);
        divs.push(div);

    }

    Great_div.append(p);
    for(var i=0;i<question_n;i++){
        Great_div.append(divs[i]);
    }
    form.append(Great_div);

}


function add_with_check_buttons(question_n){
    var form = $("form");
    var Great_div = $("<div class='form-group'></div>");
    var p = $("<p contenteditable='true'>Q)Click to change text</p>");
    var divs = [];

    for(var i =0 ;i<question_n;i++){
        input = $("<input class='form-check-input' value=val_"+(i+1)+" type='checkbox' name='question_"+n+"[]' >");
        label  = $("<label contenteditable='true' class='form-check-label'> Default radio </label>");
        div = $("<div class='form-check'></div>");
        div.append(input);
        div.append(label);
        divs.push(div);
    }

    Great_div.append(p);
    for(var i=0;i<question_n;i++){
        Great_div.append(divs[i]);
    }
    form.append(Great_div);
}

function save(){
    form = $("form")[0];
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
