function HeadComposant ({titre,description})
{
    return <>
        <head>
            <title>{titre}</title>
            <meta name="description" content={description} />
        </head>
    </>
}
function HeaderComposant ({titre})
{
    return <>
        <section>
            <header>
                <h1>{titre}</h1>
            </header>
        </section>
    </>
}
function MainComposant ({date,children})
{
    return <>
        <main>
            <section>
                <div>
                    <p>Nous sommes le {date}</p>
                </div>
                <div>
                    <p>{children}</p>
                </div>
            </section>
        </main>
    </>
}
function FooterComposant ({footer})
{
    return <>
        <footer>
            <div>
                <p>{footer}</p>
            </div>
        </footer>
    </>
}
function Composant ()
{
    let dates = new Date();
    let dateCom =  dates.getDate() +'/'+ (dates.getMonth()+1) +'/'+ dates.getFullYear()

    return <>
        < HeadComposant titre="mon titre" description="c\'est une description très utile"/>
        <body>
        < HeaderComposant titre="mon titre"/>
        < MainComposant date={dateCom}>ce contenu est utile</MainComposant>
        < FooterComposant footer='je suis un footer' />
        </body>
    </>
}

ReactDOM.createRoot(document.getElementById('composant1')).render(<Composant />)

