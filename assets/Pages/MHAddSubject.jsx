import React from 'react';
import Field from '../Components/Field';

const classes = [
    {
        name: 'Troisieme'

    },
    {
        name: 'Seconde'
    },
    {
        name: 'Premiere'
    },
    {
        name: 'Terminale'
    }
];
function MHAddSubject() {
    return (
        <form className="form-question p-2 col-md">


            <h1 className="h3 mb-3 font-weight-normal">CREATION D'UN SUJET</h1>
            <label htmlFor="username" className="sr-only">Libelé du sujet</label>
            <input type="text" id="username" className="form-control" placeholder="Libelé du sujet" required autoFocus />
            <br />
            <label htmlFor="lastnername" className="sr-only">Durée</label>
            <input type="text" id="lastname" className="form-control" placeholder="Duré du Sujet" required autoFocus />
            <br />

            <label htmlFor="email" className="sr-only">Classe</label>
            <input type="email" id="email" className="form-control" placeholder="Choisir la classe" required autoFocus />
            <br />
            <label htmlFor="classroom" className="">Classe:</label>
            <select id="classroom" className="form-control">
                <option selected>Choisir...</option>
                {
                    classes.map(classe => (
                        <option key={classe.name} value={classe.name}>{classe.name}</option>
                    ))
                }
            </select>
            <br />

            <Field label="Maxpoint" />
            <hr />
            <h1 className="h3 mb-3 font-weight-normal">AJOUTER DES QUESTIONS</h1>
            <label htmlFor="username" className="sr-only">Question</label>
            <textarea id="question" className="form-control" placeholder="Entrez la question" required autoFocus></textarea>

            <button className="btn btn-lg btn-primary btn-block" type="submit">Ajouter aux examens futures</button>
        </form>


    )
}

export default MHAddSubject;
