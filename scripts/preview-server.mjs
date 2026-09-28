// Serves a build the way GitHub Pages and Cloudflare do: extensionless page
// URLs, a 404 page, and no server-side code. The default mount matches the
// GitHub Pages project URL.
//   npm run preview   ->  http://localhost:4173/Linden-Herald-Demo/
import { createServer } from 'node:http';
import { createReadStream } from 'node:fs';
import { stat } from 'node:fs/promises';
import { resolve, extname, sep } from 'node:path';
import { pathToFileURL } from 'node:url';

const types = {
  '.html': 'text/html; charset=utf-8', '.css': 'text/css; charset=utf-8', '.js': 'text/javascript; charset=utf-8',
  '.png': 'image/png', '.jpg': 'image/jpeg', '.webp': 'image/webp', '.svg': 'image/svg+xml', '.ico': 'image/x-icon',
  '.pdf': 'application/pdf', '.xml': 'application/xml; charset=utf-8', '.txt': 'text/plain; charset=utf-8'
};

const isFile = file => stat(file).then(info => info.isFile(), () => false);

export function createPreview({ directory = '_site', mount = '/Linden-Herald-Demo/' } = {}) {
  const root = resolve(directory);
  if (!mount.startsWith('/') || !mount.endsWith('/')) throw new Error('The mount needs leading and trailing slashes.');
  return createServer(async (request, response) => {
    const send = async (status, file) => {
      const { size } = await stat(file);
      response.writeHead(status, { 'Content-Type': types[extname(file)] || 'application/octet-stream', 'Content-Length': size });
      if (request.method === 'HEAD') response.end();
      else createReadStream(file).on('error', () => response.destroy()).pipe(response);
    };
    try {
      const pathname = new URL(request.url, 'http://localhost').pathname;
      if (pathname === mount.slice(0, -1) || (pathname === '/' && mount !== '/')) {
        response.writeHead(302, { Location: mount });
        return response.end();
      }
      if (!['GET', 'HEAD'].includes(request.method)) {
        response.writeHead(405, { Allow: 'GET, HEAD' });
        return response.end();
      }
      if (pathname.startsWith(mount)) {
        const name = decodeURIComponent(pathname.slice(mount.length)) || 'index.html';
        const file = resolve(root, name);
        const hidden = name.split('/').some(part => part.startsWith('.') || part.startsWith('_'));
        if (file.startsWith(root + sep) && !hidden) {
          if (await isFile(file)) return await send(200, file);
          if (!extname(file) && await isFile(file + '.html')) return await send(200, file + '.html');
        }
      }
      if (await isFile(resolve(root, '404.html'))) return await send(404, resolve(root, '404.html'));
      throw new Error('Not found');
    } catch {
      if (!response.headersSent) response.writeHead(404, { 'Content-Type': 'text/plain' });
      response.end('Not found');
    }
  });
}

if (import.meta.url === pathToFileURL(process.argv[1]).href) {
  await stat('_site/index.html').catch(() => {
    throw new Error('Run npm run build:pages first.');
  });
  // MOUNT=/ previews the Cloudflare build (npm run build) at the site root.
  const port = Number(process.env.PORT || 4173);
  const mount = process.env.MOUNT || '/Linden-Herald-Demo/';
  createPreview({ mount }).listen(port, '127.0.0.1', () => console.log(`Preview: http://localhost:${port}${mount}`));
}
