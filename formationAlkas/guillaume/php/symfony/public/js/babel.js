let bonjour = <h1>C'est génial</h1>
let block = <React.Fragment>
    <div className="card">
        <h5 className="card-header">c'est top</h5>
        <div className="card-body">{{bonjour}}</div>
    </div>
</React.Fragment>

let section =
    <section>
        <header>
            {bonjour}
        </header>
    </section>

let container = <>
    {section}
    {section}
</>

let chiffreUn =<>
    <div>
        Chiffre 1: <input type="text" name="chiffeUn" />
        Opérateur (+,*,/,-) : <input type="text" name="opérateur" />
        Chiffre 2: <input type="text" name="chiffreDeux" />
            <input type="submit" value="Calculer" />
    </div>
</>

ReactDOM.createRoot(document.getElementById('babel')).render(chiffreUn)