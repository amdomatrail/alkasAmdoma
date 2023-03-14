## babel
convertir du html en dom
## les composants :
'<Composant /> composant simple
<TroisiemeComposant titre='Ma super page'>ici c'est mon enfant</TroisiemeComposant>
titre est la propriété
ici c'est mon enfant est le children
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
    }'
## 