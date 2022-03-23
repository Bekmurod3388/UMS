const { DataTypes, Model } = require('sequelize');
const { sequelize } = require('./index');

class Microcontroller extends Model {}

Microcontroller.init({
    name: {
        type: DataTypes.STRING,
        unique: true
    },
    serialport: DataTypes.STRING,
    port: DataTypes.STRING
}, {
    sequelize,
    createdAt: 'created_at',
    updatedAt: 'updated_at'
});
