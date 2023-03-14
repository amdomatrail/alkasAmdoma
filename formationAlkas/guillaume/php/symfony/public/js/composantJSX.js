function Composant ()
{
    return <div>bonjour</div>
}
function AutreComposant ()
{
    return <section>
        <header>
            titre
        </header>
        <Composant />

        <TroisiemeComposant titre='Ma super page'>ici c'est mon enfant</TroisiemeComposant>
    </section>
}
function TroisiemeComposant ({titre,children})
{
    return <>
        <article>
            <header>
                <h1>{titre}</h1>
            </header>
            {children}
        </article>
    </>
}

ReactDOM.createRoot(document.getElementById('composant1')).render(<AutreComposant />)
ReactDOM.createRoot(document.getElementById('composant2')).render(<AutreComposant />)
