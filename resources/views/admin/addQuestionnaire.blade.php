@extends('layouts.app')

@section('content')
<style>
.input-group-prepend{
    display: flex;
}
.input-group-text{
    border-radius: 0.25rem 0 0 0.25rem;
}
.custom-select{
    position: relative;
    -webkit-box-flex: 1;
    flex: 1 1 auto;
    width: 1%;
    margin-bottom: 0;
    display: inline-block;
    height: calc(2.25rem + 2px);
    padding: 0.375rem 1.75rem 0.375rem 0.75rem;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    
    background: #fff url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right .75rem center;
    background-size: 8px 10px;
    border: 1px solid #ced4da;
    border-radius: 0 0.25rem 0.25rem 0;
    appearance: none;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Добавить анкету') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="form" action="/admin" method="post">
                        @csrf 
                        <style>
                            .name-input, .name-input:focus{
                                border:0;
                                width: 100%;
                                outline: none;
                            }
                        </style>
                        <input name="name" value='{{"Анкета №".$next_id}}' class="name-input mb-3">
                        <select name="type" class="form-select">
                                <option selected>Выберите тип анкеты</option>
                                @foreach ($questionnaire_types as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                        </select>
                        
                        <select name="to_whom" class="form-select">
                            <option selected>Выберите для кого</option>
                            @foreach ($to_whom as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <button id="add_question_id" type="button" class="btn btn-outline-primary mb-3">Добавить вопрос</button>
                        <br>
                        <div id="form-group" class="form-group ms-3">
                        </div>
                        <button type="submit" class="btn btn-primary">Готово!</button>
                    </form>
                    <script>
                        var i = 0;
                        $("#add_question_id").click(function(){
                            i++;
                            var text =  "<label>Вопрос "+i+"</label>"+
                                        "<input name=\'q["+i+"][num]\' value = "+i+" class = \"d-none\">"+
                                        "<div class=\"input-group mb-3\">"+
                                            "<div class=\"input-group-prepend\">"+
                                                "<span class=\"input-group-text\" id=\"basic-addon1\" style=\"width:100px\">Вопрос</span>"+
                                            "</div>"+
                                            "<input name=\'q["+i+"][question]\' type=\"text\" class=\"form-control\">"+
                                        "</div>"+
                                        "<div class=\"input-group mb-3\">"+
                                            "<div class=\"input-group-prepend\">"+
                                                "<label class=\"input-group-text\" style=\"width:100px\">Тип ответа</label>"+
                                            "</div>"+
                                            "<select id=\"select_"+i+"\" onchange=\"add_question("+i+")\" class=\"custom-select\">"+
                                                "<option value=\"1\">Бальная шкала</option>"+
                                                "<option value=\"2\">Текст</option>"+
                                            "</select>"+
                                        "</div>"+
                                        "<div id=\"select_text_"+i+"\" class=\"mb-3\">"+
                                            "<input id=\"select_text_input_"+i+"\" onchange=\"add_answer("+i+")\" type=\"number\" min=\"2\" max=\"10\" value=\"2\" class=\"mb-3\">"+
                                            "<div id=\"select_text_div_"+i+"\">"+
                                                "<div class=\"input-group mb-3 ms-3 w-auto\">"+
                                                    "<div class=\"input-group-prepend\">"+
                                                        "<span class=\"input-group-text\" id=\"basic-addon1\">"+1+"</span>"+
                                                    "</div>"+
                                                    "<input name=\'q["+i+"][answers][]\' type=\"text\" class=\"form-control\" placeholder=\"Ответ\">"+
                                                "</div>"+
                                                "<div class=\"input-group mb-3 ms-3 w-auto\">"+
                                                    "<div class=\"input-group-prepend\">"+
                                                        "<span class=\"input-group-text\" id=\"basic-addon1\">"+2+"</span>"+
                                                    "</div>"+
                                                    "<input name=\'q["+i+"][answers][]\' type=\"text\" class=\"form-control\" placeholder=\"Ответ\">"+
                                                "</div>"+
                                            "</div>"
                                        "</div>";
                            $('#form-group').append(text);
                        });
                        function add_question(i) {
                                if ($("#select_"+i).val() == 1){
                                    $("#select_text_"+i).html(
                                            "<input id=\"select_text_input_"+i+"\" onchange=\"add_answer("+i+")\" type=\"number\" min=\"2\" max=\"10\" value=\"2\" class=\"mb-3\">"+
                                            "<div id=\"select_text_div_"+i+"\">"+
                                                "<div class=\"input-group mb-3 ms-3 w-auto\">"+
                                                    "<div class=\"input-group-prepend\">"+
                                                        "<span class=\"input-group-text\" id=\"basic-addon1\">"+1+"</span>"+
                                                    "</div>"+
                                                    "<input name=\'q["+i+"][answers][]\' type=\"text\" class=\"form-control\" placeholder=\"Ответ(необязательно)\">"+
                                                "</div>"+
                                                "<div class=\"input-group mb-3 ms-3 w-auto\">"+
                                                    "<div class=\"input-group-prepend\">"+
                                                        "<span class=\"input-group-text\" id=\"basic-addon1\">"+2+"</span>"+
                                                    "</div>"+
                                                    "<input name=\'q["+i+"][answers][]\' type=\"text\" class=\"form-control\" placeholder=\"Ответ(необязательно)\">"+
                                                "</div>"+
                                            "</div>");
                                }
                                else{
                                    $("#select_text_"+i).html("<input name=\'q["+i+"][answers][]\' value=\"-\" class=\"d-none\">");
                                }
                        }
                        function add_answer(num) {
                            // select_text_div_"+i
                            var str = "";
                            for(var i = 0;i<$("#select_text_input_"+num).val();i++){
                                // str+=(i+1)+"<input>"
                                str +="<div class=\"input-group mb-3 ms-3 w-auto\">"+
                                            "<div class=\"input-group-prepend\">"+
                                                "<span class=\"input-group-text\" id=\"basic-addon1\">"+(i+1)+"</span>"+
                                            "</div>"+
                                            "<input name=\'q["+num+"][answers][]\' type=\"text\" class=\"form-control\" placeholder=\"Ответ(необязательно)\">"+
                                        "</div>";
                            }
                            $("#select_text_div_"+num).html(str);
                        }
                    </script>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection