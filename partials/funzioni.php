<?php

//le variabili non si vedono dentro la funzione
//e devi passarle come argomento (segnaposto)

function getData($connDatabase, $tableGenerica){

    $sql = "SELECT * FROM $tableGenerica";
    $result = $connDatabase->query($sql);

    if ($result && $result->num_rows > 0) {
        $results = [];
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    } elseif ($result) {
        $results = [];
    } else {
        $results = false;
    }

    $connDatabase->close();

    return $results;
}

function getId($connDatabase, $tableGenerica, $id) {
    $sql = "SELECT * FROM $tableGenerica WHERE id = $id";
    $result = $connDatabase->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } elseif ($result) {
        $row = '';
    } else {
        $row = false;
    }

    $connDatabase->close();
    return $row;

}

function removeId($connDatabase, $tableGenerica, $id, $basepath){

    $sql = "DELETE FROM $tableGenerica WHERE id = ?";
    $stmt = $connDatabase->prepare($sql);
    $stmt->bind_param("i",$id);

    $id = $_POST['id'];
    $stmt-> execute();

    if ($stmt && $stmt->affected_rows > 0) {
        header("Location: $basepath/index-php.php?roomId=$id");
    } else {
        echo "non ho cancellato";
    }

    $stmt->close();
    $connDatabase->close();

}
