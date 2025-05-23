<?php
    require_once(__DIR__ .'/connection.php');
    require_once(__DIR__ .'/data.php');
    
     $conn=new mysqli($servername,$username, $password, "academia");
     sleep(2);

    //plano
    for ($i=0; $i<10; $i++){
        $planoNome=$planoNome_array[$i];
        $descricao=$descricao_array[$i];
        $valorMensal=$valor_array[$i];

        $sql="INSERT INTO plano(nome, descricao, valorMensal )
        VALUES ('$planoNome', '$descricao', $valorMensal)";

        if (mysqli_query($conn, $sql)) {
        echo "plano $i created successfully \n";
        }
        else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
 
      echo("\n");
     //Aluno
      for ($i=0; $i<10; $i++){
       
        $name=$nome_array[$i];
        $date=$data_array[$i];
        $cpf=$cpf_array[$i];
        $telefone = $telefone_array[$i];
        $email = $email_array[$i];

        $sqlPlano = "SELECT codigo FROM plano LIMIT 1 OFFSET $i";
        $resPlano = $conn->query($sqlPlano);
        $codigoPlano = $resPlano && $resPlano->num_rows > 0 ? $resPlano->fetch_assoc()['codigo'] : 1;


     $sql="INSERT INTO aluno(nome, dataNascimento, cpf, telefone, email, codigoPlano )
     VALUES ('$name', '$date','$cpf','$telefone', '$email', $codigoPlano)";

     if (mysqli_query($conn, $sql)) {
     echo "pessoa $i created successfully \n";
     }
     else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }
   }

   echo("\n");
    //instrutor
    for ($i=0; $i<10; $i++){
        

        $name=$nome_array[10+$i];
        $cref=$cref_array[$i];

        $sql="INSERT INTO instrutor(nome, cref )
        VALUES ('$name', '$cref')";

        if (mysqli_query($conn, $sql)) {
        echo "intrutor $i created successfully \n";
        }
        else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    
    echo("\n");
   //treino
    for ($i=0; $i<10; $i++){
        $treino=$treino_array[$i];
        $objetivo=$objetivo_array[$i];
        $dataInicio = $data_array[$i+10];

        

        $sqlInstrutor = "SELECT codigo FROM instrutor LIMIT 1 OFFSET $i";
        $resInstrutor = $conn->query($sqlInstrutor);
        $codigoInstrutor = $resInstrutor && $resInstrutor->num_rows > 0 ? $resInstrutor->fetch_assoc()['codigo'] : 1;

        $sqlAluno = "SELECT codigo FROM aluno LIMIT 1 OFFSET $i";
        $resAluno = $conn->query($sqlAluno);
        $codigoAluno = $resAluno && $resAluno->num_rows > 0 ? $resAluno->fetch_assoc()['codigo'] : 1;


        $sql="INSERT INTO Treino(dataInicio, objetivo, exercicios, codigoInstrutor, codigoAluno  )
        VALUES ('$dataInicio', '$objetivo', '$treino', $codigoInstrutor, $codigoAluno)";

        if (mysqli_query($conn, $sql)) {
        echo "treino $i created successfully \n";
        }
        else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

  



 $conn->close();
?>
