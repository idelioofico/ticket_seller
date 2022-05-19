function gerarCodigo(tamanho) {
    var chars = "abcdefghijkmlnopqrstuvwyxz";
    chars += "ABCDEFGHKJKMLNOPQRSTUVWYXZ";
    chars += "122346789";
    var codigo = "";
    for (var i = 0; i < tamanho; i++) {
        var posicao = Math.floor(Math.random() * chars.length);
        codigo += chars.charAt(posicao);
    }

    return codigo;
}



Date.prototype.somarDiasNaData = function(days) {
    var data_corrente = new Date(this.valueOf());
    data_corrente.setDate(data_corrente.getDate() + days);
    return data_corrente;
};