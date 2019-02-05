<!-- Adiciona Usuários -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form name="form">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Adicionar Usuários</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-warning alert-dismissible" role="alert" id="notificacao">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <span id="msgNotificacao">Usuário salvo com sucesso!</span>
            </div>
            <div class="form-group">
              <label for="nome">Nome completo: *</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo">
              <span class="invalid-feedback invalid-feedback-nome">
                  Exemplo: Ana Maria de Oliveirs
                </span>
            </div>
            <div class="form-group">
              <label for="email">E-mail: *</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
              <span class="invalid-feedback invalid-feedback-email">
                  Exemplo: ana.maria@dominio.com.br
                </span>
            </div>
            <div class="form-group">
              <label for="celular">Celular: *</label>
              <input type="text" class="form-control phone_with_ddd" id="celular" name="celular" placeholder="Digite seu celular">
              <span class="invalid-feedback invalid-feedback-celular">
                  Exemplo: (11) 00000-0000
                </span>
            </div>
            <div class="form-group">
              <label for="senha">Senha: *</label>
              <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
              <span class="invalid-feedback invalid-feedback-senha">
                  Exemplo: Letras maiúsculas e minúsculas, números e caracteres.
                </span>
            </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Limpar</button>
            <button type="submit" class="btn btn-success" name="cadastrar">Cadastrar</button> -->
            <input type="reset" class="btn btn-default" value="Limpar">
            <input type="button" class="btn btn-primary" id="cadastrarUsuario" value="Cadastrar">
          </div>
        </form>
      </div>
    </div>
  </div>