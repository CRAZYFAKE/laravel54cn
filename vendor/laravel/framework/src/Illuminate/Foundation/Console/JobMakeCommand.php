<?php

namespace Illuminate\Foundation\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
//创建工作命令
class JobMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * 控制台命令名
     *
     * @var string
     */
    protected $name = 'make:job';

    /**
     * The console command description.
     *
     * 控制台命令描述
     *
     * @var string
     */
    protected $description = 'Create a new job class';

    /**
     * The type of class being generated.
     *
     * 生成的类类型
     *
     * @var string
     */
    protected $type = 'Job';

    /**
     * Get the stub file for the generator.
     *
     * 获取生成器的存根文件
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->option('sync')//获取命令选项的值
                        ? __DIR__.'/stubs/job.stub'
                        : __DIR__.'/stubs/job-queued.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * 获取类的默认名称空间
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Jobs';
    }

    /**
     * Get the console command options.
     *
     * 获得控制台命令选项
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['sync', null, InputOption::VALUE_NONE, 'Indicates that job should be synchronous.'],
        ];
    }
}
