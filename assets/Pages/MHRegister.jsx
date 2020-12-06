import React from 'react'

const classes=[
    {
        name:'tle'
    },
    {
        name:'premiere'
    },
    {
        name:'seconde'
    },
    {
        name:'troisieme'
    }
]

function MHRegister() {
    return (
        <div>
             <form className="form-signin">
            
            {/* <img className="mb-4 col-sm center" src={logo} alt="IMG" width="72" height="72"/> */}
            <h1 className="h3 mb-3 font-weight-normal">INSCRIPTION SUR EVAL-S</h1>
            <label for="username" className="sr-only">Votre Nom</label>
            <input type="text" id="username" className="form-control" placeholder="Entrez votre nom" required autofocus/>
            <br/> 
            <label for="lastnername" className="sr-only">Votre Prénom</label>
            <input type="text" id="lastname" className="form-control" placeholder="Entrez votre nom" required autofocus/>
            <br/>
        
            <label for="email" className="sr-only">Votre Email</label>
            <input type="email" id="email" className="form-control" placeholder="Email address" required autofocus/>
            <br/>
            <label for="classroom" className="">Votre Classe:</label>
            <select id="classroom" class="form-control">
        <option selected>Choisir...</option>
        {
            classes.map(classe =>(

            <option key={classe.name} value={classe.name}>{classe.name}</option>
            ))
        }
      </select>
      <br/>
            
            <label for="password" className="sr-only">Votre de passe </label>
            <input type="password" id="password" className="form-control" placeholder="Entrez Votre mo de passe " required/>
            
            <label for="inputPassword" className="sr-only">Confirmation de mot de passe</label>
            <input type="password" id="inputPassword" className="form-control" placeholder="Confirmez mot de passe " required/>
            
            
            <button className="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
            <p>Vous avez déjà un compte ? <a href="/login">Se Connecter</a></p>
   </form>
            
        </div>
    )
}

export default MHRegister
