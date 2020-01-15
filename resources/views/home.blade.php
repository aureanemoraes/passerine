@extends('layouts.app')

@section('navbar-nav')
    <ul class="navbar-nav ml-md-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Sair') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
@endsection

@section('body')
    <div class="card" style="margin-top: 1em;">
        <div class="card-body">
            <h5 class="card-title">Meu Perfil</h5>
            <h4 class="card-title" id="nameInfo"></h4>
            <div class="table-responsive">
                <table class="table table-borderless" id="userInfoTable">
                    <tbody>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-sm btn-link" onClick="editUserInfo()">Editar</button>
        </div>
        <div class='card-columns' id="birdInfoCards" style="margin: 1em;">
        </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-sm btn-success" onClick="newBirdModal()">Novo pássaro!</button>
    </div>

    <!-- Modal User -->
    <div class="modal fade" id="userInfoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Perfil</h5>
                </div>
                <div class="modal-body">
                    <!-- Formulário para edição de dados do Usuário -->
                    <form class="form-horizontal" id="formUserInfo">
                        <input type="hidden" id="id">

                        <div class="form-group">
                            <label for="cpf" class="control-label">CPF</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cpf">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Nome</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="age" class="control-label">Idade</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="age">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="control-label">Gênero</label>
                            <div class="input-group">
                                <select class="form-control" id="gender">
                                    <option disabled>Selecione...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label">E-mail</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Bird -->
    <div class="modal fade" id="birdInfoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Perfil</h5>
                </div>
                <div class="modal-body">
                    <!-- Formulário para edição de dados do Pássaro -->
                    <form class="form-horizontal" id="formBirdInfo">
                        <input type="hidden" id="id">
                        <input type="hidden" id="action">

                        <div class="form-group">
                            <label for="anilhaCode" class="control-label">Código de Anilha</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="anilhaCode">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name_bird" class="control-label">Nome</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name_bird">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="age_bird" class="control-label">Idade</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="age_bird">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender_bird" class="control-label">Gênero</label>
                            <div class="input-group">
                                <select class="form-control" id="gender_bird">
                                    <option disabled>Selecione...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="control-label">Categoria</label>
                            <div class="input-group">
                                <select class="form-control" id="category">
                                    <option disabled>Selecione...</option>
                                    <option value="bicudo">Bicudo</option>
                                    <option value="curio">Curió</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function displayUserLine(data) {
            if (!data.cpf) cpf = 'Não informado'; else cpf = data.cpf;
            if (!data.age) age = 'Não informado'; else age = data.age + ' anos';
            if (!data.gender) gender = 'Não informado';
            else if (data.gender === "M") gender = "Masculino";
            else gender = "Feminino";
            if (!data.email) email = 'Não informado'; else email = data.email;

            line =  '<tr>' +
                        '<th>CPF</th>' +
                        '<td>' + cpf + '</td>' +
                        '<th>Idade</th>' +
                        '<td>' + age + '</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<th>Gênero</th>' +
                        '<td>' + gender + '</td>' +
                        '<th>E-mail</th>' +
                        '<td>' + email + '</td>' +
                    '</tr>';
            return line;
        }

        function loadUserInfo() {
            $.getJSON('/user', function(data) {
                if (!data.name) name = 'Não informado'; else name = data.name;
                $('#nameInfo').append(name);
                $('#id').val(data.id);
                line = displayUserLine(data);
                $('#userInfoTable>tbody').append(line);
            });
        }

        function editUserInfo() {
            $.getJSON('/user', function(data) {
                $('#id').val(data.id);
                $('#cpf').val(data.cpf);
                $('#name').val(data.name);
                $('#age').val(data.age);
                $('#gender').val(data.gender);
                $('#email').val(data.email);
                $('#userInfoModal').modal('show');
            });
        }

        function saveUserInfo() {
            data = {
                id: $('#id').val(),
                cpf: $('#cpf').val(),
                name: $('#name').val(),
                age: $('#age').val(),
                gender: $('#gender').val(),
                email: $('#email').val()
            };

            $.ajax({
                type: "PUT",
                url: "/user/" + data.id,
                context: this,
                data: data,
                success: function(user) {
                    data = JSON.parse(user);
                    element = $('#userInfoTable>tbody>tr>td');
                    if (element) {
                        if (!data.cpf) cpf = 'Não informado'; else cpf = data.cpf;
                        if (!data.name) name = 'Não informado'; else name = data.name;
                        if (!data.age) age = 'Não informado'; else age = data.age + ' anos';
                        if (!data.gender) gender = 'Não informado';
                        else if (data.gender === "M") gender = "Masculino";
                        else gender = "Feminino";
                        if (!data.email) email = 'Não informado'; else email = data.email;

                        nameElement = $('#nameInfo');
                        if(nameElement) nameElement[0].textContent = name;

                        element[0].textContent = cpf;
                        element[1].textContent = age;
                        element[2].textContent = gender;
                        element[3].textContent = email;
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function displayBirdLine(data) {
            if (!data.anilhaCode) anilhaCode = 'Não informado'; else anilhaCode = data.anilhaCode;
            if (!data.name) name = 'Não informado'; else name = data.name;
            if (!data.age) age = 'Não informado'; else age = data.age + ' anos';
            if (!data.gender) gender = 'Não informado';
            else if (data.gender === "M") gender = "Masculino";
            else gender = "Feminino";
            if (!data.category) category = 'Não informado'; else category = data.category;

            bird = "<div class='card'>" +
                        "<div class='card-body'>" +
                            '<h5 class="card-title" id="' + anilhaCode + 'Name">' + name + '</h5>' +
                                "<div class='table-responsive-sm'>" +
                                    '<table class="table table-borderless table-sm" style="font-size:12px;" id="' + anilhaCode +'">' +
                                    "<tbody>" +
                                        '<tr>' +
                                            '<th>Código Anilha</th>' +
                                            '<td>' + anilhaCode + '</td>' +
                                            '<th>Idade</th>' +
                                            '<td>' + age + '</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                            '<th>Gênero</th>' +
                                            '<td>' + gender + '</td>' +
                                            '<th>Categoria</th>' +
                                            '<td>' + category + '</td>' +
                                        '</tr>' +
                                    "</tbody>" +
                                "</table>" +
                                "</div>" +
                        "</div>" +
                        "<div class='card-footer'>" +
                            '<small class="text-muted"><button type="button" class="btn btn-sm btn-link" onClick="editBirdsInfo(' + "'" + anilhaCode + "'" + ')">Editar</button></small>' +
                        "</div>" +
                    "</div>" ;
            return bird;
        }

        function loadBirdsInfo() {
            $.getJSON('/birds', function(data) {
                if(data.length === 0) {
                    alert('Você ainda não possui pássaros cadastrados.');
                }
                for(i=0;i <data.length; i++) {
                    bird = displayBirdLine(data[i]);
                    $('#birdInfoCards').append(bird);
                }
            });
        }

        function editBirdsInfo(pk) {
            $.getJSON('/birds/' + pk, function(data) {
                $('#anilhaCode').val(data.anilhaCode);
                $('#name_bird').val(data.name);
                $('#age_bird').val(data.age);
                $('#gender_bird').val(data.gender);
                $('#category').val(data.category);
                $('#action').val('edit');
                $('#birdInfoModal').modal('show');
            });
        }

        function saveBirdInfo() {
            data_bird = {
                user_id: $('#id').val(),
                anilhaCode: $('#anilhaCode').val(),
                name: $('#name_bird').val(),
                age: $('#age_bird').val(),
                gender: $('#gender_bird').val(),
                category: $('#category').val()
            };

            $.ajax({
                type: "PUT",
                url: "/birds/" + data_bird.anilhaCode,
                context: this,
                data: data_bird,
                success: function(bird) {
                    data = JSON.parse(bird);
                    element = $('#' + data.anilhaCode + '>tbody>tr>td');
                    if (element) {
                        if (!data.anilhaCode) anilhaCode = 'Não informado'; else anilhaCode = data.anilhaCode;
                        if (!data.name) name = 'Não informado'; else name = data.name;
                        if (!data.age) age = 'Não informado'; else age = data.age + ' anos';
                        if (!data.gender) gender = 'Não informado';
                        else if (data.gender === "M") gender = "Masculino";
                        else gender = "Feminino";
                        if (!data.category) category = 'Não informado'; else category = data.category;

                        nameElement = $('#' + data.anilhaCode + 'Name');
                        if(nameElement) nameElement[0].textContent = name;

                        element[0].textContent = anilhaCode;
                        element[1].textContent = age;
                        element[2].textContent = gender;
                        element[3].textContent = category;
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function newBirdModal() {
            $('#anilhaCode').val('');
            $('#name_bird').val('');
            $('#age_bird').val('');
            $('#gender_bird').val('');
            $('#category').val('');
            $('#action').val('create');
            $('#birdInfoModal').modal('show');
        }

        function newBird() {
            bird = {
                user_id: $('#id').val(),
                name: $('#name_bird').val(),
                anilhaCode: $('#anilhaCode').val(),
                age: $('#age_bird').val(),
                gender: $('#gender_bird').val(),
                category: $('#category').val()
            };

            $.post('/birds', bird, function(data) {
                bird = JSON.parse(data);
                bird = displayBirdLine(bird);
                $('#birdInfoCards').append(bird);
                console.log(data);
            });
        }

        $("#formUserInfo").submit( function(event){
            event.preventDefault();
            saveUserInfo();
            $("#userInfoModal").modal('hide');
        });

        $("#formBirdInfo").submit( function(event){
            event.preventDefault();
            if ($("#action").val() == "edit") {
                saveBirdInfo();
            } else {
                newBird();
            }
            $("#birdInfoModal").modal('hide');
        });

        $(function(){
            loadUserInfo();
            loadBirdsInfo();
        });
    </script>
@endsection
