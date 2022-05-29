// babel.config.js
module.exports = {
  presets: ["module:metro-react-native-babel-preset"],
  env: {
    production: {
      plugins: [
        "ignite-ignore-reactotron",
        "@babel/plugin-proposal-class-properties",
      ],
    },
  },
  plugins: ["@babel/plugin-proposal-object-rest-spread"],
};