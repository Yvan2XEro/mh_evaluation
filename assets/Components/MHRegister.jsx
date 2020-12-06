import React from 'react';
import request from '../services/request';
import { toast } from 'react-toastify';

const [student, mh_setUser] = useState({
    firstName: "",
    name: "",
    email: "",
    studentClass: "",
    password: ""
});

console.log("rtdjycvkujhbk n");
request.getClasses();

const getErrors = ({ name, firstName, email, password }) => {
    const regex = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
    let errors = [];
    if (name.length < 3 || name.length > 255)
        errors["name"] = "The name must contain between 3 and 255 characters!";
    if ((firstName.length < 3 || firstName.length > 255))
        errors["firstName"] = "The first name must contain between 3 and 255 characters!";
    if (!regex.test(email))
        errors["email"] = "Invalide email!"
    if (password.length < 6 || password.length > 255)
        errors["passwors"] = "The password must contain between 6 and 255 characters!";
    return errors;

}



const mh_handleChange = ({ currentTarget }) => {
    const { name, value } = currentTarget;
    if ((name == "firstName" || name == "name")) {
        if (value.length > 3)
            mh_setUser({ ...user, [name]: value });
        else
            toast.error("The " + name + " must contain at least 3 chara")
    }
}


const mh_handleSubmit = (event) => {
    event.preventDefault();
    if (getErrors(student).length === 0) {
        try {
            PatientsRequest.add(student);
            toast.success("Success!!!!");
            history.push("/login");
        } catch (error) {
            toast.error("Failed!!!!");
            console.log(error);
        }
    }
}

request.getClasses()

const classes = [
    {
        name: 'tle'
    },
    {
        name: 'premiere'
    },
    {
        name: 'seconde'
    },
    {
        name: 'troisieme'
    }
]

function MHRegister() {
    return (
        <div>
            <form className="form-signin" onSubmit={mh_handleSubmit}>

                {/* <img className="mb-4 col-sm center" src={logo} alt="IMG" width="72" height="72"/> */}
                <h1 className="h3 mb-3 font-weight-normal">INSCRIPTION SUR EVAL-S</h1>
                <label htmlFor="name" className="sr-only">Votre prenom</label>
                <input type="text" id="name" className="form-control" value={student.firstName} onChange={mh_handleChange} placeholder="Entrez votre prenom" required autoFocus />
                <br />
                <label htmlFor="lastnername" className="sr-only">Votre nom</label>
                <input type="text" id="lastname" value={student.name} className="form-control" onChange={mh_handleChange} placeholder="Entrez votre nom" required autoFocus />
                <br />

                <label htmlFor="email" className="sr-only">Votre Email</label>
                <input type="email" id="email" value={student.email} className="form-control" onChange={mh_handleChange} placeholder="Email address" required autoFocus />
                <br />
                <label htmlFor="classroom" className="">Votre Classe:</label>
                <select id="classroom" className="form-control" value={student.studentClass} onChange={mh_handleChange}>
                    <option selected>Choisir...</option>
                    {
                        classes.map(classe => (

                            <option key={classe.name} value={classe.id}>{classe.name}</option>
                        ))
                    }
                </select>
                <br />

                <label htmlFor="password" className="sr-only">Votre de passe </label>
                <input type="password" id="password" value={student.password} className="form-control" onChange={mh_handleChange} placeholder="Entrez Votre mo de passe " required />

                <label htmlFor="inputPassword" className="sr-only">Confirmation de mot de passe</label>
                <input type="password" id="inputPassword" onChange={mh_handleChange} className="form-control" placeholder="Confirmez mot de passe " required />


                <button className="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
                <p>Vous avez déjà un compte ? <a href="/login">Se Connecter</a></p>
            </form>

        </div>
    )
}

export default MHRegister
