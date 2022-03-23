const { DataTypes, Model } = require('sequelize');
const { sequelize } = require('./index')

class Sensor extends Model {

}

Sensor.init({
    name: DataTypes.STRING,
    type: DataTypes.STRING
}, {
    sequelize,
    createdAt: 'created_at',
    updatedAt: 'updated_at'
});
