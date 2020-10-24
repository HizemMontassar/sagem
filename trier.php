<?php
    include_once 'config.php';
    
    if(isset($_POST['trier']))
    {
        $name = $_POST['trier'];
		$case = $_POST['filter'];
		$login = $_POST['login'];
        $user = $_POST['user'];
        
        if($login=="admin")
        {
            $sql="select * from Liste where $case like '%$name%' ;";
            $resultat=sqlsrv_query($conn,$sql);
             echo '<tr id="titre">
                        <td>id</td>
                        <td>Probleme</td>
                        <td>Nom du produit</td>
                        <td>UF/Service</td>
                        <td>Ref CIU</td>
                        <td>Etat</td>
                        <td>Resultat</td>
                        <td>Date de creation</td>
                        <td>Login</td>
                        <td>Actions</td>
                    </tr>';
        while($row = sqlsrv_fetch_array($resultat))
        {
            echo "<tr>
            <td>".$row['id']."</td>";
            echo "<td>".$row['probleme']."</td>
            <td>".$row['nom_produit']."</td>
            <td>".$row['uf']."</td>
            <td>".$row['ref']."</td>
            <td>".$row['etat']."</td>
            <td>".$row['resultat']."</td>
            <td>".$row["date_creation"]->format('d/m/y')."</td>
            <td>".$row['login']."</td>";
			if($login!="user"){echo '<td><a href="modifier.php?id='.$row['id'].'&user='.$user.'&login='.$login.'">Modifier</a> | <a href=" supprimer_db.php?id='.$row['id'].'">Supprimer</a></td>';}
			echo "</tr>";
        }
            
        }
        
        else
        {
            
       
        $sql="select * from Liste where $case like '%$name%' and login='$user' ;";
        $resultat=sqlsrv_query($conn,$sql);
             echo '<tr id="titre">
                        <td>id</td>
                        <td>Probleme</td>
                        <td>Nom du produit</td>
                        <td>UF/Service</td>
                        <td>Ref CIU</td>
                        <td>Etat</td>
                        <td>Resultat</td>
                        <td>Date de creation</td>
                        <td>Login</td>';
                        if($login!="user"){echo "<td>Actions</td>" ;}
                        echo "</tr>";

            
        while($row = sqlsrv_fetch_array($resultat))
        {
            echo "<tr>
            <td>".$row['id']."</td>";
            echo "<td>".$row['probleme']."</td>
            <td>".$row['nom_produit']."</td>
            <td>".$row['uf']."</td>
            <td>".$row['ref']."</td>
            <td>".$row['etat']."</td>
            <td>".$row['resultat']."</td>
            <td>".$row["date_creation"]->format('d/m/y')."</td>
            <td>".$row['login']."</td>";
			if($login!="user"){echo '<td><a href="modifier.php?id='.$row['id'].'">Modifier</a>|<a href=" supprimer_db.php?id='.$row['id'].'">Supprimer</a></td>';}
			echo "</tr>";
        }
         
        }
    }



?>