<!-- Register Section -->
<section class="page-section" id="register">
    <div class="container relative">

        <h2 class="section-title font-alt mb-40 mb-sm-40">
            Cadastro
        </h2>

        <div class="clearfix">
            <!-- Inform Tip -->
            <div class="form-tip pt-20 align-center">
                <i class="fa fa-info-circle"></i>
                Informe os dados abaixo para realizar o cadastro, será enviado um e-mail de confirmação.
            </div>
        </div>

        <!-- Divider -->
        <hr class="mt-0 mb-70 "/>
        <!-- End Divider -->

        <!-- Contact Form -->
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <form class="form contact-form" id="register_form">
                    @csrf
                    <div class="clearfix">

                        <div class="cf-left-col">

                            <!-- Name -->
                            <div class="form-group">
                                <input type="text" name="txtname" id="txtname" class="input-md round form-control" placeholder="Primeiro nome" pattern=".{3,100}" required>
                            </div>

                            <!-- User name -->
                            <div class="form-group">
                                <input type="text" name="txtusername" id="txtusername" class="input-md round form-control" placeholder="Nome de usuário" pattern=".{3,100}" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <input type="email" name="txtemail" id="txtemail" class="input-md round form-control" placeholder="Email" pattern=".{5,100}" required>
                            </div>

                        </div>

                        <div class="cf-right-col">

                            <!-- Senha -->
                            <div class="form-group">
                                <input type="password" name="txtpassword" id="txtpassword" class="input-md round form-control" placeholder="Senha" pattern=".{5,100}" required>
                            </div>

                            <!-- Retry Senha -->
                            <div class="form-group">
                                <input type="password" name="rpassword" id="rpassword" class="input-md round form-control" placeholder="Confirmação de Senha" pattern=".{5,100}" required>
                            </div>

                            <!-- Palavra secreta Senha -->
                            <div class="form-group">
                                <input type="text" name="txtchave" id="txtchave" class="input-md round form-control" placeholder="Chave de segurança" pattern=".{5,100}" required>
                            </div>
                            <input name="Token" id="Token" type="hidden" value="<?=md5(date('d-m-Y H:i'));?>">
                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        </div>

                    </div>

                    <div class="clearfix">

                        <div class="cf-left-col">

                            <!-- Inform Tip -->
                            <div class="form-tip pt-20">
                                <i class="fa fa-info-circle"></i> Todos os campos são obrigatórios.
                            </div>

                        </div>

                        <div class="cf-right-col">

                            <!-- Send Button -->
                            <div class="align-right pt-10">
                                <button class="submit_btn btn btn-mod btn-medium btn-round" id="submit_btn">Cadastrar</button>
                            </div>

                        </div>

                    </div>

                    <div id="result"></div>
                </form>

            </div>
        </div>
        <!-- End Contact Form -->

    </div>
</section>
<!-- End Register Section -->
