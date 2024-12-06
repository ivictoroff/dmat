<?php 
 include_once 'pdfCompleto.php'; 

 // Incluir conexao com BD
include_once '../../acoes/bd.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border="1">
    <tr style="margin-right: 150px;" class="border border-slate-600">
      <th class="border border-slate-600">Operação</th>
      <th class=" border border-slate-600">Missão</th>
      <th class=" border border-slate-600">Estado</th>
      <th class=" border border-slate-600">Comando Militar de Área</th>
      <th class=" border border-slate-600">Região Militar</th>
      <th class=" border border-slate-600">Comando da Operação</th>
      <th class=" border border-slate-600">Comando Apoiado</th>
      <th class=" border border-slate-600">Inicio da Operação</th>
      <th class=" border border-slate-600">Fim da Operação</th> 
    </tr>
    <?php
    ?>
    <?php
        $pesquisa = $mysqli->real_escape_string($id);
        $sql_code = "SELECT * 
            FROM operacao 
            WHERE opid LIKE '%$pesquisa%'";

        $sql_code2 = "SELECT * 
            FROM efetivo 
            WHERE eid LIKE '%$pesquisa%'";
        $sql_code3 = "SELECT * 
            FROM tipoOp 
            WHERE tid LIKE '%$pesquisa%'";
        $sql_code4 = "SELECT * 
            FROM recursos 
            WHERE rid LIKE '%$pesquisa%'";
        $sql_code5 = "SELECT * 
            FROM infos
            WHERE iid LIKE '%$pesquisa%'";
        $sql_code6 = "SELECT * 
            FROM anexos
            WHERE aid LIKE '%$pesquisa%'";

        $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
        $sql_query2 = $mysqli->query($sql_code2) or die("ERRO ao consultar! " . $mysqli->error); 
        $sql_query3 = $mysqli->query($sql_code3) or die("ERRO ao consultar! " . $mysqli->error); 
        $sql_query4 = $mysqli->query($sql_code4) or die("ERRO ao consultar! " . $mysqli->error); 
        $sql_query5 = $mysqli->query($sql_code5) or die("ERRO ao consultar! " . $mysqli->error); 
        $sql_query6 = $mysqli->query($sql_code6) or die("ERRO ao consultar! " . $mysqli->error); 

        if ($sql_query->num_rows == 0) {
    ?>
    <tr>
      <td colspan="3">Nenhum resultado encontrado...</td>
    </tr>
    <?php
      } 
      else {
        while($dados = $sql_query->fetch_assoc()) {
          while ($dados2 = $sql_query2->fetch_assoc()) {
            while ($dados3 = $sql_query3->fetch_assoc()) {
              while ($dados4 = $sql_query4->fetch_assoc()) {
                while ($dados5 = $sql_query5->fetch_assoc()) {
                  while ($dados6 = $sql_query6->fetch_assoc()) {
    ?>
    <tr class=" px-6 py-4 border border-slate-600 ">
      <td class=" px-6 py-4 border border-slate-600"><?php echo $dados['operacao']; ?></td>
      <td class=" px-6 py-4 border border-slate-600 "><?php echo $dados['estado']; ?></td>
      <td class=" px-6 py-4 border border-slate-600 "><?php echo $dados['missao']; ?></td>
      <td class=" px-6 py-4 border border-slate-600 "><?php echo $dados['cma']; ?></td>
      <td class=" px-6 py-4 border border-slate-600 "><?php echo $dados['rm']; ?></td>
      <td class=" px-6 py-4 border border-slate-600 "><?php echo $dados['comandoOp']; ?></td>
      <td class=" px-6 py-4 border border-slate-600 "><?php echo $dados['comandoApoio']; ?></td>
      <td class=" px-6 py-4 border border-slate-600 "><?php echo $dados['inicioOp']; ?></td>
      <td class=" px-6 py-4 border border-slate-600 "><?php echo $dados['fimOp']; ?></td>
    </tr>
    <tr>
      <th class=" border border-slate-600 bg-blend-darken">Participantes</th>
      <th class=" border border-slate-600 bg-blend-darken">Participantes do Exército</th>
      <th class=" border border-slate-600 bg-blend-darken">Participantes da Marinha</th>
      <th class=" border border-slate-600 bg-blend-darken">Participantes da Força Aérea</th>
      <th class=" border border-slate-600 bg-blend-darken">Participantes de Órgãos de Segurança Publica</th>
      <th class=" border border-slate-600 bg-blend-darken">Participantes de outras Âgencias Governamentais</th>
      <th class=" border border-slate-600 bg-blend-darken">Participantes de outras Âgencias Privadas</th>
      <th class=" border border-slate-600 bg-blend-darken">Participantes de Organizações Não-Governamentais</th>
      <th class=" border border-slate-600 bg-blend-darken">total de Participantes</th>
    </tr>
    <tr>
      <td class="px-6 py-4 border border-slate-600 "><?php echo $dados2['participantes']; ?></td>
      <td class="px-6 py-4 border border-slate-600 "><?php echo $dados2['participantesEb']; ?></td>
      <td class="px-6 py-4 border border-slate-600 "><?php echo $dados2['participantesMb']; ?></td>
      <td class="px-6 py-4 border border-slate-600 "><?php echo $dados2['participantesFab']; ?></td>
      <td class="px-6 py-4 border border-slate-600 "><?php echo $dados2['participantesOs']; ?></td>
      <td class="px-6 py-4 border border-slate-600 "><?php echo $dados2['participantesGov']; ?></td>
      <td class="px-6 py-4 border border-slate-600 "><?php echo $dados2['participantesPv']; ?></td>
      <td class="px-6 py-4 border border-slate-600 "><?php echo $dados2['participantesCv']; ?></td>
      <td class="px-6 py-4 border border-slate-600 "><?php echo $dados2['participantesCv'] + $dados2['participantesPv']+ $dados2['participantesEb'] + $dados2['participantesMb'] + $dados2['participantesFab'] + $dados2['participantesOs'] + $dados2['participantesGov']; ?></td>
    </tr>
    <tr style="margin-right: 150px;">
      <th style="margin-right: 150px;" class=" border border-slate-600 bg-blend-darken">operação</th>
      <th class=" border border-slate-600 bg-blend-darken" colspan="2">tipo de ação ou apoio</th>
    </tr>
    <tr>
        <td class="px-6 py-4 border border-slate-600 "><?php echo $dados3['tipoOp']; ?></td>
        <td class="px-6 py-4 border border-slate-600 " colspan="2"><?php echo $dados3['acaoOuApoio']; ?></td>
    </tr>
    <tr style="margin-right: 150px;">
      <th class="border border-slate-600 bg-blend-darken">Transporte</th>
      <th class="border border-slate-600 bg-blend-darken">manutenção</th>
      <th class="border border-slate-600 bg-blend-darken">Suprimento</th>
      <th class="border border-slate-600 bg-blend-darken">Aviação</th>
    </tr>
    <tr>
        <td class="px-6 py-4 border border-slate-600 "><?php echo $dados3['transporte']; ?></td>
        <td class="px-6 py-4 border border-slate-600 "><?php echo $dados3['manutencao']; ?></td>
        <td class="px-6 py-4 border border-slate-600 "><?php echo $dados3['suprimento']; ?></td>
        <td class="px-6 py-4 border border-slate-600 "><?php echo $dados3['aviacao']; ?></td>
    </tr>
    <tr>
      <th class="border border-slate-600 bg-blend-darken">Descrição das atividades de Transporte</th>
      <th class="border border-slate-600 bg-blend-darken">Descrição das atividades de Manutenção</th>
      <th class="border border-slate-600 bg-blend-darken">Descrição das atividades de Suprimento</th>
      <th class="border border-slate-600 bg-blend-darken">Descrição das atividades de Aviação</th>
    </tr>
    <tr>
        <td class="px-6 py-4 border border-slate-600 "><?php echo $dados3['desTransporte']; ?></td>
        <td class="px-6 py-4 border border-slate-600 "><?php echo $dados3['desManutencao']; ?></td>
        <td class="px-6 py-4 border border-slate-600 "><?php echo $dados3['desSuprimento']; ?></td>
        <td class="px-6 py-4 border border-slate-600 "><?php echo $dados3['desAviacao']; ?></td>
    </tr>
    <tr>
      <th class="border border-slate-600 bg-blend-darken">Recebidos:</th>
      <th class="border border-slate-600 bg-blend-darken">liquidados:</th>
      <th class="border border-slate-600 bg-blend-darken">Liquidados:</th>
      <th class="border border-slate-600 bg-blend-darken">Devolvidos:</th>
    </tr>
    <tr>
        <td class="px-6 py-4 border border-slate-600 "><?php echo "R$:". $dados4['recebidos']; ?></td>
        <td class="px-6 py-4 border border-slate-600 "><?php echo "R$:". $dados4['descentralizados']; ?></td>
        <td class="px-6 py-4 border border-slate-600 "><?php echo "R$:". $dados4['liquidados']; ?></td>
        <td class="px-6 py-4 border border-slate-600 "><?php echo "R$:". $dados4['devolvidos']; ?></td>
    </tr>
    <tr>
      <th class=" border border-slate-600 bg-blend-darken">Relatório Final</th>
      <th class=" border border-slate-600 bg-blend-darken">Relatório do Comando Logístico</th>
      <th class=" border border-slate-600 bg-blend-darken">Fotos</th>
      <th class=" border border-slate-600 bg-blend-darken">Outros documentos</th>
    </tr>
    <tr>
      <td style="color:blue;" class="px-6 py-4 border border-slate-600 "><a href="../../uploads/<?php echo $dados6['relatorioFinal'] ?>" target="_blank"><?php echo $dados6['relatorioFinal'] ?></a></td>
      <td style="color:blue;" class="px-6 py-4 border border-slate-600 "><a href="../../uploads/<?php echo $dados6['relatorioComando'] ?>" target="_blank"><?php echo $dados6['relatorioComando'] ?></a></td>
      <td style="color:blue;" class="px-6 py-4 border border-slate-600 "><a href="../../uploads/<?php echo $dados6['fotos'] ?>" target="_blank"><?php echo $dados6['fotos'] ?></a></td>
      <td style="color:blue;" class="px-6 py-4 border border-slate-600 "><a href="../../uploads/<?php echo $dados6['outrosDocumentos'] ?>" target="_blank"><?php echo $dados6['outrosDocumentos'] ?></a></td>
    </tr>
    <tr >
      <th class=" border border-slate-600 bg-blend-darken" colspan="9">Outras informações</th>
    </tr>
    <tr>
      <td class="px-6 py-4 border border-slate-600 "  colspan="9" rowspan="1" ><?php echo $dados5['outrasInfos'];?></td>
    </tr>
    <?php
              }
            }
          }
        }
      }
    }
  }
    ?>
    </table>

    </body>
</html>