@extends('install.layout')
@section('content')
    <div class="card" id="v_1_2">
        <div class="card-header">
            <h5>CHECK REQUIREMENTS</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Requirement</th>
                            <th>Details</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PHP Version</td>
                            <td>
                                <b>Current Version:</b> {{ $php['current'] }}<br>
                                <b>Required Version:</b> {{ $php['required'] }}
                            </td>
                            <td class="@if ($php['supported']) text-success @else text-danger @endif">
                                @if ($php['supported'])
                                    &#10004;
                                @else
                                    &#10008;
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>MySQLi Extension</td>
                            <td>
                                @if ($mysqliInstalled)
                                    Installed
                                @else
                                    Not Installed
                                @endif
                            </td>
                            <td class="@if ($mysqliInstalled) text-success @else text-danger @endif">
                                @if ($mysqliInstalled)
                                    &#10004;
                                @else
                                    &#10008;
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>MongoDB Extension</td>
                            <td>
                                @if ($mongodbInstalled)
                                    Installed
                                @else
                                    Not Installed
                                @endif
                            </td>
                            <td class="@if ($mongodbInstalled) text-success @else text-danger @endif">
                                @if ($mongodbInstalled)
                                    &#10004;
                                @else
                                    &#10008;
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>PDO Extension</td>
                            <td>
                                @if ($pdoInstalled)
                                    Installed
                                @else
                                    Not Installed
                                @endif
                            </td>
                            <td class="@if ($pdoInstalled) text-success @else text-danger @endif">
                                @if ($pdoInstalled)
                                    &#10004;
                                @else
                                    &#10008;
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>PDO MySQL Extension</td>
                            <td>
                                @if ($pdoMysqlInstalled)
                                    Installed
                                @else
                                    Not Installed
                                @endif
                            </td>
                            <td class="@if ($pdoMysqlInstalled) text-success @else text-danger @endif">
                                @if ($pdoMysqlInstalled)
                                    &#10004;
                                @else
                                    &#10008;
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>FOPEN</td>
                            <td>
                                @if ($fopenEnabled)
                                    Enabled
                                @else
                                    Disabled
                                @endif
                            </td>
                            <td class="@if ($fopenEnabled) text-success @else text-danger @endif">
                                @if ($fopenEnabled)
                                    &#10004;
                                @else
                                    &#10008;
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>ZipArchive</td>
                            <td>
                                @if ($zipInstalled)
                                    Installed
                                @else
                                    Not Installed
                                @endif
                            </td>
                            <td class="@if ($zipInstalled) text-success @else text-danger @endif">
                                @if ($zipInstalled)
                                    &#10004;
                                @else
                                    &#10008;
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Curl</td>
                            <td>
                                @if ($curlInstalled)
                                    Installed
                                @else
                                    Not Installed
                                @endif
                            </td>
                            <td class="@if ($curlInstalled) text-success @else text-danger @endif">
                                @if ($curlInstalled)
                                    &#10004;
                                @else
                                    &#10008;
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Read and Write Permission</td>
                            <td>
                                @if ($fileReadWriteEnabled)
                                    Granted
                                @else
                                    Not Granted
                                @endif
                            </td>
                            <td class="@if ($fileReadWriteEnabled) text-success @else text-danger @endif">
                                @if ($fileReadWriteEnabled)
                                    &#10004;
                                @else
                                    &#10008;
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
                <p class="content-group">
                    <button type="button" class="btn btn-primary" onclick="window.location.href='/install'">Back</button>
                    @if (
                        $php['supported'] &&
                        $pdoInstalled &&
                        $pdoMysqlInstalled &&
                        $fopenEnabled &&
                        $zipInstalled &&
                        $curlInstalled &&
                        $fileReadWriteEnabled &&
                        ($mysqliInstalled || $mongodbInstalled)
                    )
                        <button type="button" class="btn btn-primary" onclick="window.location.href='/install/environmentsetup'">Next Step</button>
                    @else
                        <button type="button" class="btn btn-primary" onclick="alert('Please meet all requirements before proceeding.')" disabled>Next Step</button>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
