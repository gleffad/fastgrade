function loggin(){
		//submit                                                 
		loggin = document.getElementById("loggin").value;        
		pass = document.getElementById("pass").value;
		if (loggin == "" || pass == ""){
			alert("erreur");
		}else{                                                    
			$.get( "./php/verif_mdp_loggin.php", { loggin: loggin ,pass: pass},
				function(data)
				{                                                
					if(data == "OK"){                            

						$.get( "./php/recuperer_nom_personne.php", { loggin: loggin},
							function(data)                       
							{
								document.cookie = data;          
								location.href="index.html";      
							});
					} else {
						alert("erreur");
					}
				});
		}
	}
}
