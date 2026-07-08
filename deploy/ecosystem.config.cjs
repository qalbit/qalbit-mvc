/**
 * PM2 process config for QalbIT Next.js on VPS.
 * Usage: pm2 start deploy/ecosystem.config.cjs
 */
module.exports = {
  apps: [
    {
      name: "qalbit-web",
      cwd: "/var/www/qalbit-mvc/apps/web",
      script: "node_modules/next/dist/bin/next",
      args: "start -p 3000",
      instances: 1,
      exec_mode: "fork",
      env_production: {
        NODE_ENV: "production",
        PORT: 3000,
      },
    },
  ],
};
