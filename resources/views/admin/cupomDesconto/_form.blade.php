<div class="input-group mb-3 col-12">
    <div class="input-group-prepend">
        <span for="nome" class="input-group-text" id="basic-addon1">Nome</span>
    </div>
    <input type="text" name="nome" id="nome" value="{{ isset($registro->nome) ? $registro->nome : null }}"
           required="required" class="form-control" placeholder="Nome" aria-label="nome" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3 col-12">
    <div class="input-group-prepend">
        <span for="localizador" class="input-group-text" id="basic-addon1">Localizador</span>
    </div>
    <input type="text" name="localizador" id="localizador"
           value="{{ isset($registro->localizador) ? $registro->localizador : null }}" required="required" class="form-control" placeholder="Localizador" aria-label="localizador" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3 col-12">
    <div class="input-group-prepend">
        <label for="modo_desconto" class="input-group-text">Modo de desconto</label>
    </div>
    <select class="custom-select" name="modo_desconto" required="required">
        <option value="">-- Selecione</option>
        <option
            value="porc" {{ isset($registro->modo_desconto) && $registro->modo_desconto == 'porc' ? ' selected ' : null }}>
            Porcentagem no valor do produto
        </option>
        <option
            value="valor" {{ isset($registro->modo_desconto) && $registro->modo_desconto == 'valor' ? ' selected ' : null }}>
            Valor fixo
        </option>
    </select>
</div>

<div class="input-group mb-3 col-12">
    <div class="input-group-prepend">
        <span for="Desconto" class="input-group-text" id="basic-addon1">Desconto</span>
    </div>
    <input type="text"
           value="{{ isset($registro->desconto) ? $registro->desconto : null }}" required="required" class="form-control" placeholder="Desconto" aria-label="Desconto" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3 col-12">
    <div class="input-group-prepend">
        <label class="input-group-text" for="modo_limite">Modo de limite</label>
    </div>
    <select name="modo_limite" required="required" class="custom-select" id="modo_limite">
        <option selected>Selecione...</option>
        <option
            value="qtd" {{ isset($registro->modo_limite) && $registro->modo_limite == 'qtd' ? ' selected ' : null }}>
            Quantidade de desconto
        </option>
        <option
            value="valor" {{ isset($registro->modo_limite) && $registro->modo_limite == 'valor' ? ' selected ' : null }}>
            Valor de desconto
        </option>
    </select>
</div>

<div class="input-group mb-3 col-12">
    <div class="input-group-prepend">
        <span for="limite" class="input-group-text" id="basic-addon1">Limite desconto</span>
    </div>
    <input type="text" name="limite" id="limite" value="{{ isset($registro->limite) ? $registro->limite : null }}"
           required="required" class="form-control" placeholder="Limite" aria-label="limite" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3 col-12">
    <div class="input-group-prepend">
        <span for="dthrValidade" class="input-group-text" id="basic-addon1">Data vencimento</span>
    </div>
    <input type="datetime-local" name="dthr_validade" id="dthr_validade"
           value="{{ isset($registro->dthr_validade) ? $registro->dthr_validade : null }}" required="required" class="form-control" placeholder="Data vencimento" aria-label="dthrValidade" aria-describedby="basic-addon1">

</div>

    <div class="input-group col-12 mb-3">
        <div class="input-group-prepend">
            <div class="input-group-prepend">
                <span for="ativo" class="input-group-text" id="basic-addon1">Ativo</span>
            </div>
            <div class="input-group-text bg-white">
                <input name="ativo" type="radio" id="ativo-s" value="S"
                       {{ isset($registro->ativo) && $registro->ativo == 'S' ? ' checked="checked"' : null }} required="required" class="input-group-text bg-white"/>
                <label for="ativo-s">Sim</label>
            </div>
                <div class="input-group-text bg-white rounded-right">

                <input name="ativo" type="radio" id="ativo-n" value="N"
                       {{ isset($registro->ativo) && $registro->ativo == 'N' ? ' checked="checked"' : null }} required="required" class="input-group-text bg-white"/>
                <label for="ativo-n">Não</label>
            </div>
        </div>
    </div>

