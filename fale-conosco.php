<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Dados recebidos do formulário
    $nome      = trim($_POST["nome"]);
    $email     = trim($_POST["email"]);
    $telefone  = trim($_POST["telefone"]);
    $mensagem  = trim($_POST["mensagem"]);

    // Configurações do envio
    $destinatario = "atendimentoagt@gmail.com";
    $assunto = "Fale Conosco - AGT Fibra";

    // Corpo do e-mail para AGT Fibra
    $corpo = "
    Nome: $nome\n
    Email: $email\n
    Telefone: $telefone\n
    Mensagem: $mensagem\n
    Data: " . date("d/m/Y") . "\n
    Hora: " . date("H:i") . "\n
    ";

    // Cabeçalhos
    $headers  = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envia para AGT Fibra
    $enviado = mail($destinatario, $assunto, $corpo, $headers);

    // Envia auto-resposta para o visitante
    if (!empty($email)) {
        $resposta  = "Olá $nome,\n\n";
        $resposta .= "Recebemos sua mensagem, em breve nossa equipe entrará em contato.\n\n";
        $resposta .= "Resumo da sua mensagem:\n$mensagem\n\n";
        $resposta .= "Atenciosamente,\nEquipe AGT Fibra";
        mail($email, "Confirmação - AGT Fibra", $resposta, "From: $destinatario");
    }

    // Retorno ao usuário
    if ($enviado) {
        echo "<script>alert('Mensagem enviada com sucesso! Em breve nossa equipe entrará em contato.');window.location.href='fale-conosco.html';</script>";
    } else {
        echo "<script>alert('Erro ao enviar mensagem. Tente novamente mais tarde.');window.location.href='fale-conosco.html';</script>";
    }

} else {
    // Bloqueia acesso direto
    header("Location: fale-conosco.html");
    exit();
}
?>
