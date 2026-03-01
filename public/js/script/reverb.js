window.Echo.channel("tickets").listen(".ticket.created", (e) => {
    console.log(e.ticket);
});
