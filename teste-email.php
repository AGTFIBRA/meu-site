<?php
$para = "atendimentoagt@gmail.com";
$assunto = "Teste de envio - AGT Fibra";
$mensagem = "Se você recebeu este e-mail, o servidor está enviando corretamente.";
$headers = "From: teste@agtfibra.com.br\r\n" .
           "Reply-To: teste@agtfibra.com.br\r\n" .
           "X-Mailer: PHP/" . phpversion();

if(mail($para, $assunto, $mensagem, $headers)){
    echo "✅ Email enviado com sucesso para {$para}";
} else {
    echo "❌ Falha no envio do e-mail. Verifique as configurações do servidor.";
}
?>
