<!-- Adicionar Posts -->
 <div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Adicionar Post</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-warning alert-dismissible" role="alert" id="notificacao">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <span id="msgNotificacao">Notícia salva com sucesso!</span>
            </div>
            <div class="form-group">
              <label for="titulo">Título: *</label>
              <input type="text" class="form-control" id="titulo" placeholder="Digite o título da notícia">
              <span class="invalid-feedback invalid-feedback-titulo">
                  Exemplo: Filme de Super Mario Bros.
              </span>
            </div>
            <div class="form-group">
              <label for="texto">Texto: *</label>
              <textarea name="editor2" class="form-control" id="texto" placeholder="Digite o texto da notícia"></textarea>
              <span class="invalid-feedback invalid-feedback-titulo">
                  Exemplo: O nosso encanador mais querido do universo dos game...
              </span>
            </div>
          <div class="modal-footer">
            <input type="reset" class="btn btn-default" value="Limpar">
            <input type="button" class="btn btn-primary" id="cadastrar" value="Cadastrar">
          </div>
        </form>
      </div>
    </div>
  </div>
