const { DataTypes, Model } = require('sequelize');
const { sequelize } = require('./index');

class TempHumidity extends Model {}

TempHumidity.init({
    temperature: DataTypes.STRING,
    humidity: DataTypes.STRING,
}, {
    sequelize,
    createdAt: 'created_at',
    updatedAt: 'updated_at',
    tableName: 'temp_humidity'
});
