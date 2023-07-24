document.addEventListener("DOMContentLoaded", async (e)=>{
    let main = document.getElementById("main");
    if(main)
    {
        let resp = await fetch("/api/books",{
            headers:{
                "Accept": "application/json",
                "X-Requested-With":"XMLHttpRequest"
            }
        });
        if(resp.ok===true)
        {
            let data = await resp.json();
            Array.from(data.books).forEach(elem=>{
                let p = document.createElement("p");
                p.innerText= `${elem.title}`;
                main.appendChild(p);
            });
        }
    }
});