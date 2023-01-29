<!-- Modal -->
<div class="modal fade" id="modalInativar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="titulo_modal">Inativar Anúncio</h1>
      </div>
      <div class="modal-body">
        <h3 class="titulo_inativar" id="inativar_title">Por que você quer inativar?<h3>
        <input type="hidden" id="id_anuncio">
        <label for="motivo" class="form-label">Motivo</label>
        <select class="form-control" id="motivo" name="motivo">
          <option selected disabled>Selecione o motivo</option>
        </select>
        <small style="color: red; font-size: 13px;" id="msg_motivo"></small>
        <br>
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" rows="3" id="descricao_modal" name="descricao"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary btn-my-modal" data-bs-dismiss="modal">Fechar</button>
        <div id="bt-inativar">
        </div>
      </div>
    </div>
  </div>
</div>