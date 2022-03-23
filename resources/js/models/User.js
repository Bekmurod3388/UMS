const { DataTypes } = require('sequelize');
const { sequelize, Sequelize } = require('./index');

const User = sequelize.define('User', {
        name: {
            type: DataTypes.STRING,
            allowNull: false
        }
    }, { timestamps: false }
);

async function run() {
    let res = await User.findAll();
    console.log(JSON.stringify(res));
}

run();
