const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"trechos.index":{"uri":"trechos","methods":["GET","HEAD"]},"trechos.create":{"uri":"trechos\/create","methods":["GET","HEAD"]},"trechos.store":{"uri":"trechos","methods":["POST"]},"trechos.show":{"uri":"trechos\/{trecho}","methods":["GET","HEAD"],"parameters":["trecho"]},"trechos.edit":{"uri":"trechos\/{trecho}\/edit","methods":["GET","HEAD"],"parameters":["trecho"]},"trechos.update":{"uri":"trechos\/{trecho}","methods":["PUT"],"parameters":["trecho"]},"trechos.destroy":{"uri":"trechos\/{trecho}","methods":["DELETE"],"parameters":["trecho"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
