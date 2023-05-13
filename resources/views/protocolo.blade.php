<!DOCTYPE html>
<html>

<head>
    <title>Protocolo</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #000;
        }

        table td,
        table th {
            padding: 8px;
            border: 1px solid #000;
        }


        h1 {
            margin-top: 0;
        }

        .text-right {
            text-align: right;
        }

        .logo {
            max-width: 200px;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .mb-4 {
            margin-bottom: 4px;
        }

        .mb-20 {
            margin-bottom: 20px;
        }
    </style>
    <meta charset="UTF-8">
</head>

<body>
    <header>
        <table>
            <tr style="border:none">
                <center> <img
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/logo.png'))) }}"
                        style="width:100px; height:100px"></center>
                <td>
                    <center>
                        <h3 style="margin-left:15px; margin-top:-15px"> PROTOCOLO DE ENTREGA </h3>
                    </center>
                    <strong style="float:right; font-size:25px; margin-top:-40px;"> Id: {{ $objeto->id }}
                    </strong><br><br>
                    <strong style="float:right; font-size: 10px; margin-top:-30px;"> Emitido
                        por:{{ $objeto->usuario->name }} </strong><br>
                    <strong style="float:right; font-size:7px; margin-top:-30px;"> Impressão em:
                        {{ date('d/m/Y H:i:s') }} </strong>
                </td>
        </table>
        <table>
            <tr>
                <td>
                    <strong>Dados do Destinatário:</strong><br>
                    <strong>Destinatário:</strong> {{ $objeto->cliente->nome }}<br>
                    <strong> CNPJ:</strong> {{ $objeto->cliente->cnpj }}<br>
                    <strong>Endereço:</strong>
                    {{ $objeto->cliente->rua . ',' . $objeto->cliente->numero . ',' . $objeto->cliente->bairro . ',' . $objeto->cliente->cidade . ',' . $objeto->cliente->estado }}<br>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <strong>Dados do Objeto:</strong><br>
                    <strong>Data envio:</strong> {{ date('d/m/Y', strtotime($objeto->data_envio)) }}<br>
                    <strong> Prazo de entrega:</strong> {{ date('d/m/Y', strtotime($objeto->data_limite)) }}8<br>
                    <strong>Tipo:</strong> {{ $objeto->tipo->nome }}<<br>
                        <strong>Descrição:</strong>{{ $objeto->descricao }}<br>
                        <strong>Observações: </strong>{{ $objeto->observacao }} <br>
                        <br>
                        <br>
                        Recebido por: ________________________________________________________ DATA:__/__/_____
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <center><strong>PONTUAL CONTABILIDADE E ADMINSTRAÇÃO DE CONDOMÍNIOS LTDA</strong> </center>
                    <center>R. Inácio Ramos de Andrade, 282B, Sala 201, Jd. Cid. Universitária - João Pessoa-PB. Tel.:
                        (83) 3045-1954 / 98895-9535</center>
                </td>
            </tr>
        </table>
        <br>
        <center><strong style="font-size:10px">----------------------------------------------- CORTE AQUI
                ----------------------------------------------- </center></strong>
        <br>
    </header>
    <header>
        <table>
            <tr style="border:none">
                <center> <img
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/logo.png'))) }}"
                        style="width:100px; height:100px"></center>
                <td>
                    <center>
                        <h3 style="margin-left:15px; margin-top:-15px"> PROTOCOLO DE ENTREGA </h3>
                    </center>
                    <strong style="float:right; font-size:25px; margin-top:-40px;"> Id: {{ $objeto->id }}
                    </strong><br><br>
                    <strong style="float:right; font-size: 10px; margin-top:-30px;"> Emitido
                        por:{{ $objeto->usuario->name }} </strong><br>
                    <strong style="float:right; font-size:7px; margin-top:-30px;"> Impressão em:
                        {{ date('d/m/Y H:i:s') }} </strong>
                </td>
        </table>
        <table>
            <tr>
                <td>
                    <strong>Dados do Destinatário:</strong><br>
                    <strong>Destinatário:</strong> {{ $objeto->cliente->nome }}<br>
                    <strong> CNPJ:</strong> {{ $objeto->cliente->cnpj }}<br>
                    <strong>Endereço:</strong>
                    {{ $objeto->cliente->rua . ',' . $objeto->cliente->numero . ',' . $objeto->cliente->bairro . ',' . $objeto->cliente->cidade . ',' . $objeto->cliente->estado }}<br>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <strong>Dados do Objeto:</strong><br>
                    <strong>Data envio:</strong> {{ date('d/m/Y', strtotime($objeto->data_envio)) }}<br>
                    <strong> Prazo de entrega:</strong> {{ date('d/m/Y', strtotime($objeto->data_limite)) }}8<br>
                    <strong>Tipo:</strong> {{ $objeto->tipo->nome }}<<br>
                        <strong>Descrição:</strong>{{ $objeto->descricao }}<br>
                        <strong>Observações: </strong>{{ $objeto->observacao }} <br>
                        <br>
                        <br>
                        Recebido por: ________________________________________________________ DATA:__/__/_____
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <center><strong>PONTUAL CONTABILIDADE E ADMINSTRAÇÃO DE CONDOMÍNIOS LTDA</strong> </center>
                    <center>R. Inácio Ramos de Andrade, 282B, Sala 201, Jd. Cid. Universitária - João Pessoa-PB. Tel.:
                        (83) 3045-1954 / 98895-9535</center>
                </td>
            </tr>
        </table>
    </header>
</body>

</html>
