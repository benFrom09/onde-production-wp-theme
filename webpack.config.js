const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require ('clean-webpack-plugin');
const HtmlWebpackPlugin = require ('html-webpack-plugin');


let mode = process.env.NODE_ENV === 'production' ? 'production' : 'development';

module.exports = {
    mode:mode,
    entry:'./assets/js/index.js',
    output:{
        filename:'app.js',
        path:path.resolve(__dirname,'./build/js'),
        assetModuleFilename: 'images/[hash][ext][query]'
    },
    module:{
        rules:[
            {
                test:/\.(png|jpe?g|gif|svg)$/i,
                type:"asset/resource"
            },
            {
                test:/\.jsx?$/,
                exclude:/node_modules/,
                use:{
                    loader:'babel-loader'
                }
            },
            {
                test:/\.s?css$/i,
                use:[
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    "postcss-loader",
                    "sass-loader"
                ]
            }
        ]
    },
    resolve:{
        extensions:['.js','.jsx']
    },

    plugins:[
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({
            filename:'../css/[name].css'
        }),
    ],
    devtool:"source-map",

}